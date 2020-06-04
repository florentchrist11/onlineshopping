
 
  <?php 
    $error = null ;
    $check = false ;
   session_start();
  
   $email = $_SESSION['email'];
   $pass = $_SESSION['password'];
   $_SESSION['emailReset'] =  $_SESSION['email'];
   $token =   $_SESSION['token'];
   var_dump(  $email);
   var_dump(  $pass);
   var_dump(  $token );
    $result2 = null ;
  
   if(isset($_POST['email'], $_POST['passwort'], $_POST['sellerID'])){
        
   require_once('mysqliteconnection.php');

       $host = "localhost";
       $name = "shop";
       $user = "root";
       $passwort = "";
       $table = "sigin";
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
  
 $password = password_hash($_POST["passwort"], PASSWORD_BCRYPT);
 $stmt = $mysql->prepare("INSERT INTO sigin 
 SET  email = ?  , pwd = ? , token = ? ");
 $stmt->execute([ $_POST["email"] , $password], $_POST["sellerID"]);
   die();
 if($token){
 header("location: dashbordSeller.php");    

           
       
       }
    

        $password = password_hash($_POST["passwort"], PASSWORD_BCRYPT);
        $stmt = $mysql->prepare('SELECT pwd FROM sigin WHERE email = ?'); 
        $stmt->execute([ $_POST["email"]]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
     
       if( password_verify (   $password ,   $result["pwd"] )){
             header("location: index.php");

  }else{
       $error = true ;
     
}

  } catch (PDOException $e){
           echo "SQL Error: ".$e->getMessage();
       }
 }
   
?>   
 <?php    require('elements/header.php')           ?> 
       <div class="center">      
 <?php  if($error):  ?>
      
 <div class="alert alert-danger"> Invalid </div>
    
<?php  endif ?>
<form action="" class="mb-4 " method="POST">
           <h1> Login </h1>
           <label for="email">  Email: </label>  
                  <input  style="width:65%" type="email" id ="email" class="form-control" name="email" placeholder=" Your E-Mail">
                  <label for="password"> Your Password: </label> 
                  <input  style="width:65%" id ="password" type="password" class="form-control" name="passwort" placeholder="Your Password ">   
                  <label>  SellerID: </label><br>
                  <input style="width:65%" type="text" class="form-control" name="sellerID" placeholder="only for seller ">
                  <br> <button>submit</button>
                  <a href="changepassword.php">password forgotten?</a> 
                  </div> 
                 </form>


<?php    require('elements/footer.php')        ?>


      

