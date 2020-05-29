<?php  require 'elements/header.php'    ?>

<?php /* Florent Fokou */   ?>
   
  <form action="dashbordSeller.php" class="mb-4">
       <div class="center"> 
       <h1> Login Seller</h1>
        
           <label>  Email:   
           <input type="email" class="form-control" name="Loginemail" placeholder="Enter your E-Mail"></label><br>
           <label>  Password: 
           <input type="password" class="form-control" name="Loginpassword" placeholder="Enter your Password "></label><br>
           <input type="submit" name="create" value="Sign in"> 
           <a href="changepassword.php">password forgotten?</a>
           
           </div> 
 </form>
  

<?php   require 'elements/footer.php'  ?>