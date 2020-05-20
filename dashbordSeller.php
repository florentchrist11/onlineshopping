
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

              <form action="" class="mb-4">
           <label  style="color:blueviolet"> Title of the product  </label><br>
           <input type="text" name="usrname"><br>
           <label style="color:blueviolet" > Description   </label><br>
           <textarea rows="4" cols="40" name="comment" form="usrform">
           </textarea><br>
           <label style="color:blueviolet" > preis  </label><br>
               <input type="preis" name="preis">
          
           <p> Bitte nur ganzzahlige Beträge eingeben </p><br>
            
             
              <i class="fa fa-camera"> </i> <Input type="file"/> <br>
              <Input type="submit" name="upload" value="Upload Image"> 
              </form>
 
          </div>
        </div>

    

<?php   require('elements/footer.php')   ?>



















