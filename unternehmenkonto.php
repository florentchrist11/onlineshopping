<?php 

$title = "Account";
require('Modell/DAOuser.php');

$error = null ;
$success = false ;
$result1 = null ;
$result2 = null ;
$check1 = false ;

if(isset($_POST['username'] , $_POST['sellerID'], $_POST['password'])){
         
 require_once('Modell/mysqliteconnection.php');
 require_once('Modell/CreateTableUser.php');
 
   
$table = "account";
$fields = 'username';
$value = $_POST['username'];
  
  $result2 = new DAOuser();
 
  $result1 = $result2 ->getTaskCountByProject( $fields , $value) ;
    if($result1){
       $error = true ;
       
    }else{

        $table = "account";
        $data = array(
             "username" => $_POST['username']  ,
              "pwd"    =>  password_hash($_POST["password"], PASSWORD_BCRYPT),
              "token"    => $_POST['sellerID']  
            
        );
        
        $success = true ;
        $result2-> insertTableEntry($table, $data );
       
     //   header("location: login.php");

}


}
   ?>

   <?php require_once 'elements/header.php'   ?>
        
<br><br><br><br>

<center>
<?php if($error && $_POST['sellerID']):  ?>
                     <div class="alert alert-danger" role="alert">
                   <?=       $usernameError = "This username is already used";?>
                  <?php elseif(  $success ) :  ?> 
                   
                 
                   <div class="alert alert-success" role="alert">
                   <?= "The E-Mail hat been send to  ". $_POST['username']."Pleace confirme your E-Mail" ;?>
  <a href="login.php" class="alert-link">to login </a>
  <?php   require 'elements/footer.php'  ?>
  </div>  
   <?=    exit       ?>
  
                     

                     <?php endif ?>
  <form action="" class="mb-4" method="POST">
       <div class="centerReg"> 
       <h1> Create Your Selleraccount</h1>
           <label>  Username:  </label><br> 
           <input style="width:45%" type="email" class="form-control" name="username" placeholder="email ">
           <label>  SellerID: </label><br>
           <input style="width:45%" type="text" class="form-control" name="sellerID" placeholder="Enter your ID ">
           <label>  Password: </label><br>
           <input style="width:45%" type="password" class="form-control" name="password" placeholder="Enter your Password ">
           <input type="submit" name="create" value="Sign in"> 
           <a href="changepassword.php">password forgotten?</a>
           
           </div> 
 </form>
  

<?php   require 'elements/footer.php'  ?>