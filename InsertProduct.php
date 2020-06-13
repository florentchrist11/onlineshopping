<?php  



if(isset($_FILES['Myimage']) AND $_FILES['Myimage']['error'] == 0){
    $test = $_FILES['Myimage'];
  
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
            echo "Susscces";
  
 } catch (PDOException $e){
     echo "SQL Error: ".$e->getMessage();
 }
 
 
   
  
  
   } else {
     echo "Sorry, there was an error uploading your file.";
   }
 }
 
 
 }









?>