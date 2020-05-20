<?php  require 'elements/header.php'    ?>

  
   
  <form action="dashbordSeller.php" class="mb-4">
       <div class="center"> 
       <h1 style="color:chartreuse"> Login Seller</h1>
        
           <label  style="color:blueviolet" >  Email:   </label><br>
           <input type="email" class="form-control" name="Loginemail" placeholder="Enter your E-Mail">
           <label style="color:blueviolet">  Password: </label><br>
           <input type="password" class="form-control" name="Loginpassword" placeholder="Enter your Password ">
           <input type="submit" name="create" value="Sign in"> 
           <a href="changepassword.php">password forgotten?</a>
           
           </div> 
 </form>
  

<?php   require 'elements/footer.php'  ?>