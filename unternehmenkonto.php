<?php 

$title = "Account";
require('DAOuser.php');

$error = null ;
$success = null ;
$result1 = null ;
$result2 = null ;
$check1 = false ;

if(isset($_POST['username'] , $_POST['sellerID'], $_POST['password'])){
         
 require_once('mysqliteconnection.php');
 require_once('CreateTableUser.php');
 
   
$table = "account";
$field = 'username';
$value = $_POST['username'];
  
  $result2 = new DAOuser();
 
  $result1 = $result2 ->isUse($table, $field, $value);

    if($result1){
       $error = true ;
       
    }else{

        $table = "account";
        $data = array(
             "username" => $_POST['username']  ,
              "pwd"    =>  password_hash($_POST["password"], PASSWORD_BCRYPT),
              "token"    => $_POST['sellerID']  
            
        );
        
        $result2-> insertTableEntry($table, $data );
       
        header("location: login.php");

}


}
   ?>

   <?php require_once 'elements/header.php'   ?>
        
<br><br><br><br>
<center>
  <form action="" class="mb-4" method="POST">
       <div class="centerReg"> 
       <h1> Create Your Selleraccount</h1>
           <label>  Username:  </label><br> 
           <input style="width:45%" type="username" class="form-control" name="username" placeholder="username">
           <label>  SellerID: </label><br>
           <input style="width:45%" type="text" class="form-control" name="sellerID" placeholder="Enter your ID ">
           <label>  Password: </label><br>
           <input style="width:45%" type="password" class="form-control" name="password" placeholder="Enter your Password ">
           <input type="submit" name="create" value="Sign in"> 
           <a href="changepassword.php">password forgotten?</a>
           
           </div> 
 </form>
  

<?php   require 'elements/footer.php'  ?>