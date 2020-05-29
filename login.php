 <?php    require('elements/header.php')                        ?>
  

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
       






<form action="" class="mb-4 " method="POST">
    
       <div class="center"> 
           <h1> Login </h1>
           <label>  Email:   
                  <input type="email" class="form-control" name="email" placeholder=" Your E-Mail"></label><br>
                  <label> Your Password:   
                  <input type="password" class="form-control" name="passwort" placeholder="Your Password "></label><br>
                  <button>submit</button>
           <a href="changepassword.php">password forgotten?</a>
           
            
           </div> 
 </form>
  
  








<?php    require('elements/footer.php')        ?>


      

 </form>