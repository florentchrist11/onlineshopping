
 
  <?php 
    $error = null ;
   session_start();
  
   $email = $_SESSION['email'];
   $password = $_SESSION['password'];
   $_SESSION['emailReset'] =  $_SESSION['email'];


require('src/CheckData.php');


if(isset($_POST['email'], $_POST['passwort'])){

   if($email == $_POST['email'] && $password == $_POST['passwort'] ){
        
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
          SET  email = ?  , pwd = ? ");
          $stmt->execute([ $_POST["email"] , $password]);
      
         exit();
       
       
      
       } catch (PDOException $e){
           echo "SQL Error: ".$e->getMessage();
       }


       header("location: index.php");

       
   }else{
      $error = true ;
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
                     
                <br> <button>submit</button>
           <a href="changepassword.php">password forgotten?</a>
           
            
           </div> 
 </form>
  
  








<?php    require('elements/footer.php')        ?>


      

