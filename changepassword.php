
<?php     
require('DAOuser.php');

 $error = null ;  
 $sussess = null ;  
 $result2 = null ;
 $result1 = null ;
 $check = null ;
 $result = null ;

  if(isset($_POST['username'], $_POST['passwort'])){
         
    require_once('mysqliteconnection.php');

   
  
            
        require_once('mysqliteconnection.php');
        require_once('CreateTableUser.php');
         
      $table = "account";
      $field = 'username';
      $value = $_POST['username'];
  
  $result2 = new DAOuser();
 
  $result1 = $result2 ->isUse($table, $field, $value);

  

   if( isset($result1) && ($_POST['passwort']==$_POST['confirmation'])){
   $password = password_hash($_POST["passwort"], PASSWORD_BCRYPT);  

  $table = "account";
  $data = array(
       "pwd" =>   $password
     
  );
  $clause = array(
     "username" => $_POST["username"]
  );
  $operator = array();
 
  $check  = $result2->updateTableEntry($table, $data, $clause, $operator);
     

     if( $check ){

      header("location: login.php");
      
     }
 
   
       }else{
       $error = true ;
     
       }
      }
    


?>
<?php   require_once 'elements/header.php'           ?>
    <div class="center"> 
<?php   if($error):      ?>
  <div class="alert alert-danger"> Invalid </div>
 <?php   endif  ?>
<?php   if( $sussess):      ?>
  <div class="alert alert-success"> Your Password had been changed </div>
 <?php   endif  ?>
<form action="" class="mb-4" method="post">
           <h1>  reset password </h1>
          <label for ="text"> username:  </label><br>
          <input  style="width:65%"  type="text" class="form-control" name="username" placeholder="username"> 
          <label for="password"> Your Password: </label> 
           <input  style="width:65%"  type="password" class="form-control" name="passwort" placeholder="Your Password ">
           <label for="password"> Your Password: </label> 
            <input  style="width:65%" id ="password" type="password" class="form-control" name="confirmation" placeholder="Your Password ">
             <br> <button >submit</button>
           <a href="login.php"> login?</a> 
        </div> 
 </form>
  


<?php     require 'elements/footer.php'                 ?>
