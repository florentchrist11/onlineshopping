 <?php    require('elements/header.php')           ?>
  

  <?php 
require('src/CheckData.php');


$errors[] = null ;
$error = null ;
$success = null ;

if(isset($_POST['email'], $_POST['passwort'])){

   
 $data = new CheckData( "" ,  $_POST['email'], "", "" , "" ,  $_POST['passwort'] );
 echo "<pre>";
 var_dump($_POST['email']);
 echo "</pre>";
      
if($data->is_Valider()){
       $success = true ;
        }else{
      
         $errors = $data->getError();
         $error = true ;

       
        } 
       }
     
?>    
       


                 
       <?php if(!$error):  ?>
    <div class="alert alert-danger" role="alert">
        Invalide
    </div>
    <?php endif ?>



<form action="" class="mb-4 " method="POST">
    
       <div class="center"> 
           <h1> Login </h1>
           <label for="email">  Email: </label>  
                  <input  style="width:65%" type="email" id ="email" class="form-control" name="email" placeholder=" Your E-Mail">
                  <?php if(isset($errors['email'])): ?>      
       <div class="invalid-feedback">  <?= $errors['email'] ?> </div>           
    <?php endif  ?>
                <label for="password"> Your Password: </label> 
                <input  style="width:65%" id ="password" type="password" class="form-control" name="passwort" placeholder="Your Password ">
                <?php if(isset($errors['password'])): ?>      
       <div class="invalid-feedback">  <?= $errors['password'] ?></div>           
    <?php endif  ?>
                <br> <button>submit</button>
           <a href="changepassword.php">password forgotten?</a>
           
            
           </div> 
 </form>
  
  








<?php    require('elements/footer.php')        ?>


      

 </form>