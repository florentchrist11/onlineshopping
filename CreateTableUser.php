<?php 


$host = "localhost";
$name = "shop";
$user = "root";
$passwort = "";
$table = "account";

  //  $mysql = new PDO("mysqli:host=$host;dbname=$name", $user, $passwort);
  $mysql = new mysqli($host,  $user , $passwort ,$name  );
 // $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  //  $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
    
$sqlTable = "CREATE TABLE IF NOT EXISTS  $table  (
<<<<<<< HEAD
   
=======
>>>>>>> bcd4269d53abbff96fc59b5e095dfd597a6b84aa
   id INT  AUTO_INCREMENT,
   username VARCHAR(20)  ,
   email VARCHAR(70)  ,
   street VARCHAR(50),
   postcode INT,
   city VARCHAR(50),
   token VARCHAR(50),
   sellerID VARCHAR(50) UNIQUE,
   pwd VARCHAR(50) UNIQUE,
   CONSTRAINT id PRIMARY KEY (id),
   )";
     $mysql->query($sqlTable);
   
if ($mysql->query( $sqlTable) === TRUE) {
   echo "Table  created successfully";
 } else {
   
 }









?>