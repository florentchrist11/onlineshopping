<?php    require('elements/header.php')                        ?>
  
 
               
  <form action="dashbordSeller.php"  class="mb-4">
          <div class="center"> 
             <h1 style="color:chartreuse">  Login  Admin </h1>

             <p style="color:blueviolet" >  Email:</p>
           <label > 
           <input type="email" class="form-control" name="Loginemail" placeholder="Enter your E-Mail">
           </label><br>

           <p style="color:blueviolet" >  ID:</p>
           <label >
           <input type="password" class="form-control" name="Loginpassword" placeholder="Enter your ID ">
           </label><br>
           
           <label> <input type="submit" name="create" value="Sign in"> <label > 
           <a href="changepassword.php">password forgotten?</a>
          </div>
   </form>
    
    
  
  
  
  
  
  
  
  
  <?php    require('elements/footer.php')        ?>
  
  
        
  
   </form>