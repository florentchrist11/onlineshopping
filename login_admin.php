<?php    require('elements/header.php')                        ?>
  
 
               
  <form action="dashbordSeller.php"  class="mb-4">
          <div class="center"> 
           <h1 style="color:chartreuse">  Login </h1>
             <label for ="email" >  Email:  </label>
             <input type="email" class="form-control" name="Loginemail" placeholder="Enter your E-Mail">
             <label for="password" > Password:   </label> 
             <input type="password" class="form-control" name="Loginpassword" placeholder="Enter your Password ">
             <input type="submit" name="create" value="Submit"> 
             <a href="changepassword.php">password forgotten?</a> 
          </div>
   </form>
    
    
  
  
  
  
  
  
  
  
  <?php    require('elements/footer.php')        ?>
  
  
        
  
   </form>