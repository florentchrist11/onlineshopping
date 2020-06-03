
<?php   require 'elements/header.php'  ; 

$error = null ;  
    session_start();
  
    $email =  $_SESSION['emailReset'];

   



  
  if(isset($_POST['email'], $_POST['passwort'])){
  
     if($email == $_POST['email'] && $_POST['confirmation'] == $_POST['passwort'] ){
          var_dump(  $email);  
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
           
             $password = password_hash($_POST["passwort"], PASSWORD_BCRYPT);
             $stmt = $mysql->prepare("UPDATE sigin 
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














<form action="" class="mb-4" method="post">
       <div class="center"> 
           <h1>  reset password </h1>
           
           <label for ="email"> Email adresse:  </label><br>
          
          <input  style="width:65%"  type="email" class="form-control" name="Loginemail" placeholder="Enter your E-Mail"> 
          
          <label for="password"> Your Password: </label> 
           <input  style="width:65%"  type="password" class="form-control" name="passwort" placeholder="Your Password ">
           
           <label for="password"> Your Password: </label> 
                <input  style="width:65%" id ="password" type="password" class="form-control" name="confirmation" placeholder="Your Password ">
           <button >submit</button>

        </div> 
 </form>
  


<?php     require 'elements/footer.php'                 ?>
