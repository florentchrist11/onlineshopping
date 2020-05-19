 
<?php  require('elements/header.php')       ?>
       
       
       <form action="" class="mb-4">
              <div class="center"> 
                  <h1 style="color:chartreuse">  Account</h1>

                  <p style="color:blueviolet" >  Your name:</p>
                 <label > 
                  <input type="text" class="form-control" name="username" placeholder="Name angeben">
                  </label><br>

                  <p style="color:blueviolet" >  Email:</p>
                  <label > 
                  <input type="email" class="form-control" name="email" placeholder="Password angeben">
                  </label><br>

                  <p style="color:blueviolet" >  Password:</p>
                  <label >
                  <input type="password" class="form-control" name="passwort" placeholder="Password angeben">
                  </label><br>

                  <p style="color:blueviolet" >  Re-enter Password :</p>
                  <label > 
                  <input type="password" class="form-control" name="email" placeholder="Password angeben">
                  </label><br>

                  
                  <label >  <input type="submit" name="create" value="Submit"> </label>
                  </div> 
        </form>
         
       
       
       
       
       
       
         
       
       <?php   require('elements/footer.php')        ?>