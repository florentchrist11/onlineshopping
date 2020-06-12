
<?php   require 'elements/header.php'  ; 

 $error = null ;  
 $sussess = null ;  
 $result2 = null ;
 $result1 = null ;

  if(isset($_POST['email'], $_POST['passwort'])){
         
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
      
/*---------------------------------------------------------------
 * Example :
 *---------------------------------------------------------------
 * $table = "account";
 * $data = array(
 *      "last_name" => "KAMGA",
 *      "first_name" => "Stéphane"
 * );
 * $clause = array(
 *      "id" => 2
 * );
 * $operator = array();
 *---------------------------------------------------------------
 * $result = updateTableEntry($table, $data, $clause, $operator);
 *---------------------------------------------------------------
 */
       header("location: login.php");
   
       }else{
       $error = true ;
     
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
