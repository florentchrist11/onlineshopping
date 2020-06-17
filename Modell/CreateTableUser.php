<?php

$stmt = new PDO('sqlite:bd_shops.sqlite3');
$table = "account";

$sqlTable = "CREATE TABLE IF NOT EXISTS  $table  (
   id INT  AUTO_INCREMENT,
   username VARCHAR(20),
   email VARCHAR(70),
   street VARCHAR(50),
   postcode INT,
   city VARCHAR(50),
   token VARCHAR(50),
   sellerID VARCHAR(50),
   pwd VARCHAR(50),
   CONSTRAINT id PRIMARY KEY (id)
   )";
   
   $stmt->exec($sqlTable);
?>