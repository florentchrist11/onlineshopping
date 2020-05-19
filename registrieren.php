 
<?php  require('elements/header.php')       ?>
       
       
       <form action="" class="mb-4">
              <div class="center"> 
                <h1 style="color:chartreuse">  Account</h1>
              <label for="name" >  Your name:   </label>
                  <input type="text" class="form-control" name="username" placeholder="Your Name ">
                  <label for="adress"> Street: </label>
                  <input type="text" class="form-control" name="street" placeholder="Your Street">
                  <label for="email" >   Email:    </label>
                 <input type="email" class="form-control" name="email" placeholder="Your Email">
                  <label for="pwd" >  Password:  </label>
                  <input type="password" class="form-control" name="passwort" placeholder="Your Password ">
                  <label >   Re-enter Password : </label>
                  <input type="password" class="form-control" name="email" placeholder="Your Passwor">
                  
                  <input type="submit" name="create" value="Submit"> 
                  </div> 
        </form>
         
       
       
       
       
       
       
         
       
       <?php   require('elements/footer.php')        ?>