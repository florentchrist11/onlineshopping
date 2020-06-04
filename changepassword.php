
<?php   require 'elements/header.php'  ; 

 $error = null ;  
 $sussess = null ;  
 session_start();
 $email =  $_SESSION['emailReset'];
   // var_dump(  $email);
  if(isset($_POST['email'], $_POST['passwort'])){
         
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
        $stmt = $mysql->prepare('SELECT email FROM sigin WHERE email = ?'); 
        $stmt->execute([ $_POST['email']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if( isset($result) && ($_POST['passwort']==$_POST['confirmation'])){
        $password = password_hash($_POST["passwort"], PASSWORD_BCRYPT);  
        $stmt = $mysql->prepare(" UPDATE sigin 
        SET   pwd = ? ");
        $stmt->execute([  $password]);
        $sussess = true ;
       header("location: login.php");
   
       }else{
       $error = true ;
     
      }

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
