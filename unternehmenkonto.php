<?php  require 'elements/header.php'  ;


$error = null ;
$success = null ;
$result1 = null ;
$result2 = null ;
$check1 = false ;

if(isset($_POST['username'] , $_POST['sellerID'], $_POST['password'])){
    
 require_once('mysqliteconnection.php');

 $host = "localhost";
 $name = "shop";
 $user = "root";
 $passwort = "";
 try{
     $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
     $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
    
  $stmt = $mysql->prepare('SELECT username FROM account WHERE username = ?'); 
  
      $stmt->execute([ $_POST["username"]]);
      $result1 = $stmt->fetchObject();
      if($result1){
            
      }else{
     session_start();
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $stmt = $mysql->prepare("INSERT INTO account
    SET  username = ? , pwd = ? , token = ? ");
    $stmt->execute([ $_POST["username"],  $password , $_POST['sellerID'] ]);
    $_SESSION['username'] = $_POST["username"] ;
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
           <label>  Username:  </label><br> 
           <input type="username" class="form-control" name="username" placeholder="username">
           <label>  SellerID: </label><br>
           <input type="text" class="form-control" name="sellerID" placeholder="Enter your ID ">
           <label>  Password: </label><br>
           <input type="password" class="form-control" name="password" placeholder="Enter your Password ">
           <input type="submit" name="create" value="Sign in"> 
           <a href="changepassword.php">password forgotten?</a>
           
           </div> 
 </form>
  

<?php   require 'elements/footer.php'  ?>