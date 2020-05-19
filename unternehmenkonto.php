<?php  require 'elements/header.php'    ?>

  
   
  <form action="dashbordSeller.php" class="mb-4">
       <div class="center"> 
       <h1 style="color:chartreuse"> Login Seller</h1>
           <label for="email" >  E-Mail:  </label>
           <input type="email" class="form-control" name="username" placeholder="Your E-Mail ">
           <label for="pwd" >  </label>
           <input type="password" class="form-control" name="username" placeholder="Your ID">
       <input type="submit" name="create" value="Submit"> 
           <a href="changepassword.php">password forgotten?</a>
           </div> 
 </form>
  

<?php   require 'elements/footer.php'  ?>