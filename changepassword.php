
<<<<<<< HEAD
<?php   require 'elements/header.php'     
 
=======
<?php   require 'elements/header.php'  ; 
>>>>>>> 258eb4c6c6dbb1bc5827abdaccae6d52d4ba6246

 $error = null ;  
 $sussess = null ;  
 session_start();
 $email =  $_SESSION['emailReset'];
   // var_dump(  $email);
  if(isset($_POST['email'], $_POST['passwort'])){
         
    require_once('mysqliteconnection.php');

<<<<<<< HEAD
<form action="" class="mb-4">
       <div class="center"> 
           <h1>  reset password </h1>
           
           <label for ="email"> Email adresse:  </label><br>
           <input type="email" class="form-control" id="email" name="Loginemail" placeholder="Enter your E-Mail"><br> 
           <button >submit</button>
=======
    $host = "localhost";
    $name = "shop";
    $user = "root";
    $passwort = "";
  
    try{
        $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
        $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
        $stmt = $mysql->prepare('SELECT email FROM account WHERE email = ?'); 
        $stmt->execute([ $_POST['email']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if( isset($result) && ($_POST['passwort']==$_POST['confirmation'])){
        $password = password_hash($_POST["passwort"], PASSWORD_BCRYPT);  
        $stmt = $mysql->prepare(" UPDATE account
        SET   pwd = ? ");
        $stmt->execute([  $password]);
        $sussess = true ;
       header("location: login.php");
   
       }else{
       $error = true ;
     
      }
>>>>>>> 258eb4c6c6dbb1bc5827abdaccae6d52d4ba6246

     } catch (PDOException $e){
        echo "SQL Error: ".$e->getMessage();
     }
   }

?>
    <div class="center"> 
<?php   if($error):      ?>
  <div class="alert alert-danger"> Invalid </div>
 <?php   endif  ?>
<?php   if( $sussess):      ?>
  <div class="alert alert-success"> Your Password had been changed </div>
 <?php   endif  ?>
<form action="" class="mb-4" method="post">
           <h1>  reset password </h1>
          <label for ="email"> Email adresse:  </label><br>
          <input  style="width:65%"  type="email" class="form-control" name="email" placeholder="Enter your E-Mail"> 
          <label for="password"> Your Password: </label> 
           <input  style="width:65%"  type="password" class="form-control" name="passwort" placeholder="Your Password ">
           <label for="password"> Your Password: </label> 
            <input  style="width:65%" id ="password" type="password" class="form-control" name="confirmation" placeholder="Your Password ">
             <br> <button >submit</button>
           <a href="login.php"> login?</a> 
        </div> 
 </form>
  


<?php     require 'elements/footer.php'                 ?>
