<?php    require('elements/header.php')  ;         
    /* Florent Fokou */   
$succes = null ;
$error= null;
$count = 0 ;


if(isset($_POST['username'], $_POST['password'])){
     
     if($_POST['username']== "Admin"&& $_POST['password']== 'Admin'){
      
      $error = 'False User';
     header("Location: dashbordAdmin.php"); 
     }else{
      header("Location: index.php"); 

     }

}


?>
               
  <form action="login_admin.php"  class="mb-4" method="POST">
          <div class="center"> 
             <h1> Login Admin </h1>
            
             <label for ="username"> Username:  </label> <br>
                  <input type="text" id="username" class="form-control" name="username" placeholder=" Your E-Mail">
                  <label for ="password"> Password:  </label> <br> 
                  <input type="password" id ="password" class="form-control" name="password" placeholder="Your Password "><br>
             <input type="submit" name="create" value="Sign in"> 
          </div>
   </form>
    
    

  
  
  <?php    require('elements/footer.php')        ?>
  
  
        
  
   