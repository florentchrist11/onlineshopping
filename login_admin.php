<?php    require('elements/header.php')  ;         

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
             <h1> Login Admin </h1>
            
             <label> Username:  
                  <input type="text" class="form-control" name="username" placeholder=" Your E-Mail"> </label><br>
                  <label> Password:   
                  <input type="password" class="form-control" name="password" placeholder="Your Password "></label><br>
             <input type="submit" name="create" value="Sign in"> 
            <a href="bloguser.php">password forgotten?</a>
            
          </div>
   </form>
    
    
  
  
  
  
  
  
  
  
  <?php    require('elements/footer.php')        ?>
  
  
        
  
   </form>