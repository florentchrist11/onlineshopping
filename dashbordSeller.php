<?php 
 
require('elements/header.php')  ;


require('src/CheckProduct.php');
$errors[] = null ;
$error = null ;
$success = null ;

if(isset($_POST['signup'])){

   
 $data = new CheckProduct($_POST['username'],$_POST['qty'],$_POST['price'],$_POST['Idescription']);


      
if($data->is_Valider()){
       $success = true ;
     
       
        }else{
      
         $errors = $data->getError();
         $error = true ;

       
        } 
       }
 ?>
       <?php if($success):  ?>

        <?php
if(isset($_FILES['Myimage']) AND $_FILES['Myimage']['error'] == 0){
   $test = $_FILES['Myimage'];
   echo "<pre>";
   var_dump( $test);
   echo "</pre>";

 $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["Myimage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["Myimage"])) {
  $check = getimagesize($_FILES["Myimage"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["Myimage"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["Myimage"]["tmp_name"], $target_file)) {
    $dts = "uploads/". basename( $_FILES["Myimage"]["name"])   ;
    var_dump($dts );

    echo "The file ". basename( $_FILES["Myimage"]["name"]). " has been uploaded.";
   
  
   
require('mysqliteconnection.php');

$host = "localhost";
$name = "shop";
$user = "root";
$passwort = "";
$table = "Produkt";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
    $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
$sqlTable = "CREATE TABLE IF NOT EXISTS  $table  (

   id INT  AUTO_INCREMENT,
   username VARCHAR(20),
   price VARCHAR(20),
   qty VARCHAR(50),
   Myimage VARCHAR(50),
   Idescription VARCHAR(50),
   CONSTRAINT id PRIMARY KEY (id)
   )";
     $mysql->exec($sqlTable);
          
           $stmt = $mysql->prepare("INSERT INTO Produkt
           SET username = ? , price = ? , qty = ?, Myimage = ?,
           Idescription = ? ");
           $stmt->execute([ $_POST["username"],$_POST["price"],$_POST["qty"],
           $dts ,  $_POST["Idescription"]]);
           echo "Dein Produkt wurde angelegt";
 
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}


  
 
 
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


}
?>
        
   <?php endif ?>


<div class="rand"> 
                     <?php if($error):  ?>
                     <div class="alert alert-danger" role="alert">
                         Invalide
                     </div>
                     <?php endif ?>
           <div class="navbar">
           <a class="glyphicon glyphicon-user"  href="Profil.php"> Profil</a> 
           <a class="fa fa-bell" style="font-size:24px"> Delete </a>
           <a class="fa fa-gift" style="font-size:24px"> Update</a>
        </div>
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-plus"></i> Add New Product</strong>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" >
                        <div class="form-group col-md-6">
                            <label for="username" class="col-form-label">Name </label>
                            <input type="text" class="form-control" id="name" name="username" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Preis </label>
                            <input  value=" <?= isset($_POST['price'])? htmlentities($_POST['price']): '' ?>" style="width:65%" type="number" id="price" name="price"  class="form-control <?= isset($errors['price'])? 'is-invalid' : ''    ?>" placeholder="In Euro" >

                            <?php if(isset($errors['price'])): ?>      
                           <div class="invalidText">  <?= $errors['price'] ?> </div>           
                           <?php endif  ?>
                        
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qty" class="col-form-label">Stückzahl </label>
                            <input  value=" <?= isset($_POST['qty'])? htmlentities($_POST['qty']): '' ?>" style="width:65%" type="number" id="qty" name="qty"  class="form-control <?= isset($errors['qty'])? 'is-invalid' : ''    ?>" placeholder="quantity" >

                           <?php if(isset($errors['qty'])): ?>      
                           <div class="invalidText">  <?= $errors['qty'] ?> </div>           
                           <?php endif  ?>                        </div>
                        <div class="form-group col-md-4">
                            <label for="Myimage" class="col-form-label">Image </label>
                            <input type="file" class="form-control" name="Myimage" id="image"  placeholder="Image URL">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="Idescription" class="col-form-label">description  </label>
                        <textarea name="Idescription" id="" rows="5" class="form-control" placeholder="description"></textarea>
                    </div> 
                    <button type="submit" name="signup" class="btn btn-success"><i class="fa fa-check-circle"></i> Hinzufügen</button>
                </form>
            </div>
        </div>

