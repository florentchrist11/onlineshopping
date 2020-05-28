 <?php    require('elements/header.php')                        ?>
  
 <?php /*
@florent fokou 

*/ ?>
  <?php 
require('src/CheckData.php');


$errors[] = null ;
$error = null ;
$success = null ;

if(isset($_POST['email'], $_POST['passwort'])){

   
 $data = new CheckData( "" ,  $_POST['email'], "", "" , $_POST['passwort'] , "");
 echo "<pre>";
 var_dump($data);
 echo "</pre>";
      
if($data->is_Valider()){
       $success = true ;
     
       
        }else{
      
         $errors = $data->getError();
         $error = true ;

       
        } 
       }
     
?>    
       






<form action="" class="mb-4" method="POST">
    
       <div class="center"> 
           <h1 style="color:chartreuse">  Login </h1>
           <label style="color:blueviolet">  Email:   </label>
                  <input type="email" class="form-control" name="email" placeholder=" Your E-Mail">
                  <label style="color:blueviolet"> Your Password:   </label>
                  <input type="password" class="form-control" name="passwort" placeholder="Your Password ">
           <label> <input type="submit" name="create" value="Sign in"> <label > 
           <a href="changepassword.php">password forgotten?</a>
           
            
           </div> 
 </form>
  
  








<?php    require('elements/footer.php')        ?>


      

 </form>