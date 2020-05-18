<?php    require('elements/header.php')                        ?>
  
 
               
  <form action="dashbordSeller.php"  class="mb-4">
          <div class="center"> 
           <h1 style="color:chartreuse">  Login </h1>
             <label > 
             <p style="color:blueviolet" >  Email:</p>
             <input type="email" class="form-control" name="Loginemail" placeholder="Enter your E-Mail">
             </label><br>
             <label >
             <p style="color:blueviolet" >  Password:</p>
             <input type="password" class="form-control" name="Loginpassword" placeholder="Enter your Password ">
             </label> <br>
             <label> <input type="submit" name="create" value="Submit"> </label>
             <a href="changepassword.php">password forgotten?</a> 
          </div>
   </form>
    
    
  
  
  
  
  
  
  
  
  <?php    require('elements/footer.php')        ?>
  
  
        
  
   </form>