<?php          
      
$succes = null ;
$error= null;
$count = 0 ;


if(isset($_POST['username'], $_POST['password'])){
     
     if(!($_POST['username']== "Admin" && $_POST['password']== 'Admin')){
      
      $error = 'False User';
    // header("Location: index.php"); 
     }else{
      header("Location: dashbordAdmin.php"); 

     }

}
include ('elements/header.php')  ;      
?>
   
<br><br><br>
<?php if ($error):?>
     <div class="alert alert-danger" role="alert">
     <?= "This page is only for Admin"; require('elements/footer.php'); die;?>
     
<?php endif ?>
<center>
  <form action="login_admin.php"  class="mb-4" method="POST">
          <div class="center"> 
             <h1> Login Admin </h1>
            
             <label for ="username"> Username:  </label> <br>
                  <input style="width:45%" type="text" id="username" class="form-control" name="username" placeholder=" Your E-Mail">
                  <label style="width:45%" for ="password"> Password:  </label> <br> 
                  <input style="width:45%" type="password" id ="password" class="form-control" name="password" placeholder="Your Password "><br>
             <input type="submit" name="create" value="Sign in"> 
          </div>
   </form>
    
    

  
  
  <?php    require('elements/footer.php')        ?>
  
  
        
  
   