 
<?php  require('elements/header.php')  ; 

require('src/CheckData.php');

/*
@florent fokou 

*/

$errors[] = null ;
$error = null ;
$success = null ;

if(isset($_POST['username'],$_POST['email'],$_POST['street'], $_POST['postcode'] , $_POST['city'], $_POST['password'] 
, $_POST['confirmation'])){

 $data = new CheckData($_POST['username'],$_POST['email'],$_POST['street'],$_POST['postcode'] , $_POST['city'], 
       $_POST['password'], $_POST['confirmation']);

       var_dump( $data);
      
if($data->is_Valider()){
       $success = true ;
      
     //  var_dump(   $success  );
       
        }else{
      
         $errors = $data->getError();
         $error = true ;

         echo"<pre>";
        var_dump(   $errors);
         echo"</pre>";
        } 
       }
     
?>
       
 <div class="centerReg"> 
                  
 <?php if($error):  ?>
    <div class="alert alert-danger" role="alert">
        Invalide
    </div>
    <?php endif ?>
    <?php if($success):  ?>
    <div class="alert alert-success"role="alert"> 
        Valide
      <?=  header('Location: Offer.php') ?>;
        <?= $_POST[''] = null  ?>
        
    </div>
    <?php endif ?>
       <form action=""  method="POST" class="mb-4" > 
  <legend style="color:chartreuse"> <h1>  Account</h1>   </legend>  
  <div class="form-group" >      
 <label style="color:blueviolet"> Your name:   </label>
  <input  value=" <?= isset($_POST['username'])? htmlentities($_POST['username']): '' ?>" style="width:65%" type="text"  name="username" placeholder=" Your Name " required class="form-control <?= isset($errors['username'])? 'is-invalid' : ''    ?>" >
     <?php if(isset($errors['username'])): ?>      
       <div class="invalid-feedback">  <?= $errors['username'] ?>  </div>           
    <?php endif  ?>
  </div>
  <div class="form-group">
    <label style="color:blueviolet">  Email:   </label>
   
    <input  value=" <?= isset($_POST['email'])? htmlentities($_POST['email']): '' ?>" style="width:65%" type="email" required class="form-control  <?= isset($errors['email'])? 'is-invalid' : ''    ?> " name="email" placeholder=" Your E-Mail">
    <?php if(isset($errors['email'])): ?>      
       <div class="invalid-feedback">  <?= $errors['email'] ?>  </div>           
    <?php endif  ?>
  </div>
   

   <div class="form-group">
   <label style="color:blueviolet"> Your Street:   </label>
  <input style="width:65%" value=" <?= isset($_POST['street'])? htmlentities($_POST['street']): '' ?>" type="text" required  class="form-control  <?= isset($errors['street'])? 'is-invalid' : ''    ?> " name="street" placeholder="Your Street ">
  <?php if(isset($errors['street'])): ?>      
       <div class="invalid-feedback">  <?= $errors['street'] ?>  </div>           
    <?php endif  ?>
   </div>
   <div class="form-group">
<label style="color:blueviolet"> Your Post Code:   </label>
<input style="width:65%" value=" <?= isset($_POST['postcode'])? htmlentities($_POST['postcode']): '' ?>"  id="invalid" type="text" required class="form-control   <?= isset($errors['postCode'])? 'is-invalid' : ''    ?> " name="postcode" placeholder="Your Post Code " required / >
<?php if(isset($errors['postCode'])): ?>      
       <div class="invalid-feedback">  <?= $errors['postCode'] ?>  </div>           
    <?php endif  ?>
</div>
<div class="form-group">
<label style="color:blueviolet"> Your City:   </label>
 <input style="width:65%" value=" <?= isset($_POST['city'])? htmlentities($_POST['city']): '' ?>" type="text" required class="form-control  <?= isset($errors['city'])? 'is-invalid' : ''    ?>" name="city" placeholder="Your City ">
 <?php if(isset($errors['city'])): ?>      
       <div class="invalid-feedback">  <?= $errors['city'] ?>  </div>           
    <?php endif  ?>
</div>  
 <div class="form-group">         
 <label style="color:blueviolet"> Your Password:   </label>
                  <input style="width:65%" value=" <?= isset($_POST['password'])? htmlentities($_POST['password']): '' ?>" type="password" required class="form-control  <?= isset($errors['password'])? 'is-invalid' : ''    ?>" name="password" placeholder="Your Password ">
                  <?php if(isset($errors['password'])): ?>      
       <div class="invalid-feedback">  <?= $errors['password'] ?>  </div>           
    <?php endif  ?>
               </div>
                  <div class="form-group">
                  <label style="color:blueviolet"> Confirm your Password:   </label>
                  <input style="width:65%" value=" <?= isset($_POST['confirmation'])? htmlentities($_POST['confirmation']): '' ?>"type="password" required class="form-control <?= isset($errors['confirmation'])? 'is-invalid' : ''    ?>" name="confirmation" placeholder="confirmed Your Password ">
                  <?php if(isset($errors['confirmation'])): ?>      
       <div class="invalid-feedback">  <?= $errors['confirmation'] ?>  </div>           
    <?php endif  ?>
               </div>
<button style="color:blueviolet" >submit</button>
</form>
 </div> 
       
  
       
       <?php          ?>