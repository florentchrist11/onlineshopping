<?php  require 'elements/header.php'    ?>

  
   
  <form action="" class="mb-4">
       <div class="center"> 
       <h1 style="color:chartreuse"> Login Seller</h1>
       <label > <p style="color:blueviolet" >  E-Mail:</p>
           <input type="text" class="form-control" name="username" placeholder="Your E-Mail ">
           </label><br>
           <label > <p style="color:blueviolet" >  CellerID:</p>
           <input type="text" class="form-control" name="username" placeholder="Your ID">
           </label><br>
           <label > <p style="color:blueviolet" >  Password:</p>
           <input type="email" class="form-control" name="email" placeholder="Your Password ">
           </label><br>
           <a href="changepassword.php">password forgotten?</a>
           <label >  <input type="submit" name="create" value="Submit"> </label>
           </div> 
 </form>
  

<?php   require 'elements/footer.php'  ?>