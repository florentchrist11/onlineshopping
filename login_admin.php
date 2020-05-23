<?php    require('elements/header.php')  ;         

/*
@florent fokou 

*/
$succes = null ;
$error= null;
$count = 0 ;


if(isset($_POST['username'], $_POST['password'])){
     
       $count +=  1 ;
     var_dump($count);  

}


?>
  
   
               
  <form action="login_admin.php"  class="mb-4" method="POST">
          <div class="center"> 
             <h1 style="color:chartreuse">  Login  Admin </h1>
            
             <label style="color:blueviolet">  Username:   </label>
                  <input type="text" class="form-control" name="username" placeholder=" Your E-Mail">
                  <label style="color:blueviolet">  Password:   </label>
                  <input type="password" class="form-control" name="password" placeholder="Your Password ">
             <input type="submit" name="create" value="Sign in"> 
           <a href="bloguser.php">password forgotten?</a>
            
          </div>
   </form>
    
    
  
  
  
  
  
  
  
  
  <?php    require('elements/footer.php')        ?>
  
  
        
  
   </form>