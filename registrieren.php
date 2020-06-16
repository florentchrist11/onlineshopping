<?php      
     


require_once('src/CheckData.php');
require_once('DAOuser.php');

$password = null ;

 $error = null ;
$success = null ;
$result1[] = null ;
$result2 = null ;
$check1 = false ;
$test = false ;

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
        
 require_once('mysqliteconnection.php');
 require_once('CreateTableUser.php');

 $table = "account";
 $field = 'username';
 $value = $_POST['username'];
  
  $result2 = new DAOuser();
  

 
 
 

  $result1 = $result2 ->isUse($table, $field, $value);
     

      if($result1){
         $error = true ;

         header("location: registrieren.php");

         
         
      }else{
 
          $table = "account";
          $data = array(
               "username" => $_POST['username']  ,
               "email"    => $_POST['email']  ,
               "street"   => $_POST['street'],
               "postcode" => $_POST['postcode'],
                "city"    => $_POST['city'], 
                "pwd"    =>  password_hash($_POST["password"], PASSWORD_BCRYPT)
              
          );
        
          $result2-> insertTableEntry($table, $data );
         
          header("location: login.php");
          exit;

  }
 
   ?>
        
   <?php endif ?>









   <?php  require('elements/header.php'); ?>
     
 <div class="centerReg"> 
                  
                  <?php if($error):  ?>
                     <div class="alert alert-danger" role="alert">
                     This Name is allready exit
                     </div>
                     <?php endif ?>
       <form action=""  method="POST" class="well coll-md-6" > 
  <legend text-align: center  > <h1>  Account</h1>   </legend>  
  <div class="form-group" >      
 <label for="name"> Your name: </label>  
  <input  value=" <?= isset($_POST['username'])? htmlentities($_POST['username']): '' ?>" style="width:65%" type="text" id="name" name="username"  class="form-control <?= isset($errors['username'])? 'is-invalid' : ''    ?>"  placeholder=" Your Name " >
     <?php if(isset($errors['username'])): ?>      
       <div class="invalid-feedback">  <?= $errors['username'] ?> </div>           
    <?php endif  ?>
  </div>
  <div class="form-group">
    <label for="email">  Email:   </label>
    <input  value=" <?= isset($_POST['email'])? htmlentities($_POST['email']): '' ?>" style="width:65%" type="email" id="email" class="form-control  <?= isset($errors['email'])? 'is-invalid' : ''    ?> " name="email" placeholder=" Your E-Mail">
    <?php if(isset($errors['email'])): ?>      
       <div class="invalid-feedback">  <?= $errors['email'] ?> </div>           
    <?php endif  ?>
  </div>
   
   <div class="form-group">
   <label for="street"> Your Street:  </label> 
  <input style="width:65%" value=" <?= isset($_POST['street'])? htmlentities($_POST['street']): '' ?>" type="text" id="street" class="form-control  <?= isset($errors['street'])? 'is-invalid' : ''    ?> " name="street" placeholder="Your Street ">
  <?php if(isset($errors['street'])): ?>      
       <div class="invalid-feedback">  <?= $errors['street'] ?> </div>           
    <?php endif  ?>
   </div>
   <div class="form-group">
<label for="invalid" > Your Post Code: </label>  
<input style="width:65%" value=" <?= isset($_POST['postcode'])? htmlentities($_POST['postcode']): '' ?>"  id="invalid" type="text"  class="form-control   <?= isset($errors['postCode'])? 'is-invalid' : ''    ?> " name="postcode" placeholder="Your Post Code "  >
<?php if(isset($errors['postCode'])): ?>      
       <div class="invalid-feedback">  <?= $errors['postCode'] ?></div>           
    <?php endif  ?>
</div>
<div class="form-group">
<label for="city"> Your City: </label>  
 <input style="width:65%" value=" <?= isset($_POST['city'])? htmlentities($_POST['city']): '' ?>" id ="city" type="text"  class="form-control  <?= isset($errors['city'])? 'is-invalid' : ''    ?>" name="city" placeholder="Your City ">
 <?php if(isset($errors['city'])): ?>      
       <div class="invalid-feedback">  <?= $errors['city'] ?> </div>           
    <?php endif  ?>
</div>  
 <div class="form-group">         
 <label for="password"> Your Password:</label>
                  <input style="width:65%"  type="password"  class="form-control  <?= isset($errors['password'])? 'is-invalid' : ''    ?>" id="password" name="password" placeholder="Your Password ">
                  <?php if(isset($errors['password'])): ?>      
       <div class="invalid-feedback">  <?= $errors['password'] ?></div>           
    <?php endif  ?>
               </div>
                  <div class="form-group">
                  <label for="confirm"> Confirm your Password:</label> 
                  <input style="width:65%" type="password"  id ="confirm" class="form-control <?= isset($errors['confirmation'])? 'is-invalid' : ''    ?>" name="confirmation" placeholder="confirmed Your Password ">
                  <?php if(isset($errors['confirmation'])): ?>      
       <div class="invalid-feedback">  <?= $errors['confirmation'] ?>  </div>          
    <?php endif  ?>
               </div>
 <button >submit</button>
</form>
 </div> 
               
       
       <?php  require('elements/footer.php')        ?>