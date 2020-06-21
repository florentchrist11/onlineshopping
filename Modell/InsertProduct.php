<?php  

 $successInsert = false ;
 $failure = false ;
 $message = null ;

require_once('DAOuser.php');

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
   //  echo "File is not an image.";
     $uploadOk = 0;
   }
 }
 
 // Check if file already exists
 if (file_exists($target_file)) {
  // echo "Sorry, file already exists.";
  $failure = true ;
  $message = "Sorry, there was an error uploading your file change your file!";
   $uploadOk = 0;
 }
 
 // Check file size
 if ($_FILES["Myimage"]["size"] > 500000) {
   echo "Sorry, your file is too large.";
   $uploadOk = 0;
 }
 
 // Allow certain file formats
 if($imageFileType != "jpg" && $imageFileType != "png" 
 && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
   $uploadOk = 0;
 }
 
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
  // echo "Sorry, your file was not uploaded.";
 // if everything is ok, try to upload file
 } else {
   if (move_uploaded_file($_FILES["Myimage"]["tmp_name"], $target_file)) {
     $dts = "uploads/". basename( $_FILES["Myimage"]["name"])   ;
   
    // echo "The file ". basename( $_FILES["Myimage"]["name"]). " has been uploaded.";
    
   // $message =  "The file ". basename( $_FILES["Myimage"]["name"]). " has been uploaded.";
    
 require('mysqliteconnection.php');
 
 $table = "product";
 try{
        require("CreateTableProduct.php");
        
  $result2 = new DAOuser();
        $table = "Product";
        $data = array(
    "username" =>  htmlspecialchars( $_POST["username"]),
    "price"    => htmlspecialchars( $_POST["price"]) ,
    "qty"      => htmlspecialchars($_POST["qty"]) ,
    "Myimage"  => htmlspecialchars( $dts) ,
    "Idescription" =>htmlspecialchars( $_POST["Idescription"]) 
        );
   
        $result2-> insertTableEntry($table, $data );
        $successInsert = true ;
        $message = "Success";

      

  
 } catch (PDOException $e){
   //  echo "SQL Error: ".$e->getMessage();

 
 }
 
 
   
  
  
   } else {
  
   }
 }
 
 
 }









?>