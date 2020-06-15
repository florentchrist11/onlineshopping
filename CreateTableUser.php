<?php 


$host = "localhost";
$name = "shop";
$user = "root";
$passwort = "";
$table = "account";

    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
    $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
    
$sqlTable = "CREATE TABLE IF NOT EXISTS  $table  (
   
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
     $mysql->exec($sqlTable);
   
if ($mysql->query( $sqlTable) === TRUE) {
   echo "Table  created successfully";
 } else {
   
 }









?>