
<?php   require('elements/header.php')          ?>

        <div class="rand"> 
           <div class="navbar">
           <a class="glyphicon glyphicon-user"  href="Profil.php"> Profil</a> 
           <a class="fa fa-bell" style="font-size:24px"> News </a>
           <a class="fa fa-gift" style="font-size:24px"> Discount</a>
          </div>
          <div class="container">
          <h1>upload pictures </h1>
          <p>you can load your picture hier!! </p>
           <label > 
           <p style="color:blueviolet" >Title of the product</p>
           <input type="text" name="usrname">
           </label><br>
           <label > 
           <p style="color:blueviolet" > Description </p>
           <textarea rows="4" cols="40" name="comment" form="usrform">
           </textarea>
           </label><br>
           <label > 
           <p style="color:blueviolet" >preis</p>
           <input type="text" name="preis">
           </label><p> Bitte nur ganzzahlige Beträge eingeben </p><br>
            
              <form action="" method = "POST" encrtype="multipart/form-data">
              <i class="fa fa-camera"></i><Input type="file"/> </Input> <br>
              <p><Input type="submit" name="upload" value="Upload Image"></p>
              </form>
 
          </div>
        </div>

        <?php
   if(isset($_POST['upload'])){
       echo " goal!!!!!!!!!!!!  ";
   }
     ?>

<?php   require('elements/footer.php')   ?>



















