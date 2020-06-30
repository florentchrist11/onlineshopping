<?php      
    session_start();   
$title = "Register";

require_once('src/CheckData.php');
require_once('Modell/DAOuser.php');

$password = null ;

 $error = null ;
$success = false ;
$result1[] = null ;
$result2 = null ;
$check1 = false ;
$test = false ;
$usernameError = null ;

if(isset($_POST['username'],$_POST['email'],
$_POST['street'], $_POST['postcode'] ,
 $_POST['city'], $_POST['password'] 
, $_POST['confirmation'])){

   
 $data = new CheckData($_POST['username'],$_POST['email'],$_POST['street'],$_POST['postcode'] , $_POST['city'], 
       $_POST['password'], $_POST['confirmation']);

      
if($data->is_Valider()){
       $success = true ;
      
       
        }else{
         $errors = $data->getError();
         $error = true ;
        } 
       }
     
?>
 
    <?php if($success):  ?>
    
    <?php   

 $table = "account";
 $fields = "username";
 $value = $_POST['username'];
  
  $result2 = new DAOuser();

 // $result1 = $result2 ->isUse( $table, $field, $value );
  $result1 = $result2 ->getTaskCountByProject( $fields , $value) ;

      if($result1){
         $error = true ;
         $usernameError = "This username is already used";
      //   header("location: registrieren.php");   
      }else{
          $table = "account";
          $data = array(
               "username"  => trim( htmlspecialchars($_POST['username'] ))  ,
               "email"     => trim( htmlspecialchars($_POST['email'] )) ,
               "street"    => trim( htmlspecialchars( $_POST['street'])),
               "postcode"  => trim( htmlspecialchars($_POST['postcode'])) ,
                "city"     => trim( htmlspecialchars($_POST['city'])) , 
                "pwd"     => trim(  htmlspecialchars( password_hash($_POST["password"], PASSWORD_BCRYPT)))
              
          );
          $success = true ;
          $result2->insertTableEntry($table, $data );
         
       //   header("location: login.php");
       //   exit;

  }
 
   ?>
        
   <?php endif ?>









   <?php  require('elements/header.php'); ?>
     
 <div class="centerReg"> 

                  <center>
                  <?php if($error && empty($errors)&&$_POST['email']):  ?>
                     <div class="alert alert-danger" role="alert">
                   <?=       $usernameError = "This username is already used";?>
                  <?php elseif(  $success ) :  ?> 
                    <div class="alert alert-success" role="alert">
                    <a href="login.php" class="alert-link"></a> 
                   <?= "The E-Mail hat been send to  ". $_POST['email']."Pleace confirme your E-Mail" ;?>
                   <div class="alert alert-primary" role="alert">
  <a href="login.php" class="alert-link">to login </a>
  <?php  require('elements/footer.php')  ;   
   exit ;
  ?>
</div    
                     

                     <?php endif ?>
                    
       <form action=""  method="POST" class="well coll-md-6" > 
  <legend text-align: center  > <h1>  Create account</h1>   </legend>  
  <div class="form-group" >      
 <label for="name">  name </label>  
  <input  value=" <?= isset($_POST['username'])? htmlentities($_POST['username']): '' ?>" style="width:45%" type="text" id="name" name="username"  class="form-control <?= isset($errors['username'])? 'is-invalid' : ''    ?>"  placeholder=" Your Name " >
     <?php if(isset($errors['username'])): ?>      
       <div class="invalid-feedback"> 
       </div>  
       <?= $errors['username'] ?> </div>           
    <?php endif  ?>
 
  <div class="form-group">
    <label for="email">  Email   </label>
    <input  value=" <?= isset($_POST['email'])? htmlentities($_POST['email']): '' ?>" style="width:45%" type="email" id="email" class="form-control  <?= isset($errors['email'])? 'is-invalid' : ''    ?> " name="email" placeholder=" Your E-Mail">
    <?php if(isset($errors['email'])): ?>      
       <div class="invalid-feedback"> 
       </div>
           <?= $errors['email'] ?> </div>           
    <?php endif  ?>
 
   
   <div class="form-group">
   <label for="street">  Street  </label> 
  <input style="width:45%" value=" <?= isset($_POST['street'])? htmlentities($_POST['street']): '' ?>" type="text" id="street" class="form-control  <?= isset($errors['street'])? 'is-invalid' : ''    ?> " name="street" placeholder="Your Street ">
  <?php if(isset($errors['street'])): ?>      
       <div class="invalid-feedback"> 
       </div>
           <?= $errors['street'] ?> </div>           
    <?php endif  ?>
  
   <div class="form-group">
<label for="invalid" >  Post Code </label>  
<input style="width:45%" value=" <?= isset($_POST['postcode'])? htmlentities($_POST['postcode']): '' ?>"  id="invalid" type="text"  class="form-control   <?= isset($errors['postCode'])? 'is-invalid' : ''    ?> " name="postcode" placeholder="Your Post Code "  >
<?php if(isset($errors['postCode'])): ?>      
       <div class="invalid-feedback"> 
       </div> 
           <?= $errors['postCode'] ?>          
    <?php endif  ?>

<div class="form-group">
<label for="city">  City </label>  
 <input style="width:45%" value=" <?= isset($_POST['city'])? htmlentities($_POST['city']): '' ?>"
  id ="city" type="text"  class="form-control  <?= isset($errors['city'])? 'is-invalid' : ''    ?>"
   name="city" placeholder="Your City ">
 <?php if(isset($errors['city'])): ?>      
       <div class="invalid-feedback"> 
       </div>   
       <?= $errors['city'] ?> </div>           
    <?php endif  ?>

 <div class="form-group">         
 <label for="password">  Password</label>
                  <input style="width:45%"  type="password"  class="form-control  <?= isset($errors['password'])? 'is-invalid' : ''    ?>" id="password" name="password" placeholder="Your Password ">
                  <?php if(isset($errors['password'])): ?>      
       <div class="invalid-feedback"> 
       </div>
           <?= $errors['password'] ?>        
    <?php endif  ?>
              
                  <div class="form-group">
                  <label for="confirm">  Password confirmation</label> 
                  <input style="width:45%" type="password"  id ="confirm"
                   class="form-control <?= isset($errors['confirmation'])? 'is-invalid' : ''    ?>" 
                   name="confirmation" placeholder="confirmed Your Password ">
                  <?php if(isset($errors['confirmation'])): ?>      
       <div class="invalid-feedback"> 
       </div>
           <?= $errors['confirmation'] ?>  </div>          
    <?php endif  ?>
              
 <br><button >submit</button>
</form>
 </div> 
               
       
       <?php  require('elements/footer.php')        ?>