
 
  <?php 
    $error = null ;
    $check = false ;
   session_start();
  
   $email = $_SESSION['email'];
   $pass = $_SESSION['password'];
   $_SESSION['emailReset'] =  $_SESSION['email'];
   $token =   $_SESSION['token'];
   $username = $_SESSION['username'];
   var_dump(  $email);
   var_dump(  $pass);
   var_dump(  $token );
   var_dump(  $username );

    $result2 = null ;
    $result1 = null ;
    $test = false ;
    $check1 = false ;
    $checktoken  = false ;
   if(isset($_POST['username'], $_POST['passwort'], $_POST['sellerID'])){

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
           

  
       $stmt = $mysql->prepare('SELECT * FROM account WHERE username = ?'); 
           $stmt->execute([ $_POST["username"]]);
           $result1 = $stmt->fetch(PDO::FETCH_ASSOC);

           $password = password_hash($_POST["passwort"], PASSWORD_BCRYPT);
           var_dump( $password );
           var_dump( $result1["pwd"]);
           
       
              if(!empty( $result1['token'])){
              header("location: dashbordSeller.php");
              }else{
                     header("location: index.php");   
  
     
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
           <label for="username">  username: </label>  
                  <input  style="width:65%" type="text" class="form-control" name="username" placeholder=" username">
                  <label>  SellerID: </label><br>
                  <input style="width:65%" type="text" class="form-control" name="sellerID" placeholder="only for seller ">
                  <label for="password"> Your Password: </label> 
                  <input  style="width:65%" id ="password" type="password" class="form-control" name="passwort" placeholder=" Password ">   
                  <br> <button>submit</button>
                  <a href="changepassword.php">password forgotten?</a> 
                  </div> 
                 </form>


<?php    require('elements/footer.php')        ?>


      

