<?php  require 'elements/header.php'  ;


$error = null ;
$success = null ;
$result1 = null ;
$result2 = null ;
$check1 = false ;

if(isset($_POST['email'] , $_POST['sellerID'], $_POST['password'])){

 
       
  
             
 require_once('mysqliteconnection.php');

 $host = "localhost";
 $name = "shop";
 $user = "root";
 $passwort = "";
 $table = "customer";
 try{
     $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
     $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
     
$sqlTable = "CREATE TABLE IF NOT EXISTS  $table  (
 
    id INT  AUTO_INCREMENT,
    email VARCHAR(20),
    pwd VARCHAR(50),
    token VARCHAR(50) NOT NULL,
    CONSTRAINT id PRIMARY KEY (id)
    )";
      $mysql->exec($sqlTable);
    
if ($mysql->query( $sqlTable) === TRUE) {
    echo "Table   created successfully";
  } else {
    echo "Error creating table: " . $mysql->error;
  }
    
  $stmt = $mysql->prepare('SELECT email FROM customer WHERE email = ?'); 
  
      $stmt->execute([ $_POST["email"]]);
      $result1 = $stmt->fetchObject();
      var_dump($result1);
      if($result1){
             die();
      }else{
     session_start();
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $stmt = $mysql->prepare("INSERT INTO customer
    SET  email = ? , pwd = ? , token = ? ");
    $stmt->execute([ $_POST["email"],  $password , $_POST['sellerID'] ]);
    $_SESSION['email'] = $_POST["email"] ;
    $_SESSION['password'] = $_POST["password"] ; 
    $_SESSION['token'] =  $_POST['sellerID']  ; 

   //$user_ID = $mysql->lastInsertID();
   header("location: login.php");
   echo "Your Account hat been successfully created";
   
 
  }


 } catch (PDOException $e){
  //   echo "SQL Error: ".$e->getMessage();
 }

}
   ?>
        


  <form action="" class="mb-4" method="POST">
       <div class="center"> 
       <h1> Create Your Selleraccount</h1>
           <label>  Email:  </label><br> 
           <input type="email" class="form-control" name="email" placeholder="Enter your E-Mail">
           <label>  SellerID: </label><br>
           <input type="text" class="form-control" name="sellerID" placeholder="Enter your ID ">
           <label>  Password: </label><br>
           <input type="password" class="form-control" name="password" placeholder="Enter your Password ">
           <input type="submit" name="create" value="Sign in"> 
           <a href="changepassword.php">password forgotten?</a>
           
           </div> 
 </form>
  

<?php   require 'elements/footer.php'  ?>