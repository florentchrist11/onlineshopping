<?php
/*
$servername = "localhost";
$username = "root";
$password = "" ;

$conn_1 =  new mysqli($servername, $username, $password);

if ($conn_1->connect_error) {
    die("Connection failed: " . $conn_1->connect_error);
}
// Create database
$sql = "CREATE DATABASE IF NOT EXISTS shop";
if ($conn_1->query($sql) === TRUE) {
 // echo "Database created successfully";

} else {
    echo "Error creating database: " . $conn_1->error;
  }
*/


$db = new PDO('sqlite:bd_shops.sqlite3');
$db = 'phpfacile_mabase.sqlite';

// Connexion
try {
    $bd = new SQLiteDatabase($db);
} catch (SQLiteException $e) {
    die("La création ou l'ouverture de la base [$base] a échouée ".
         "pour la raison suivante: ".$e->getMessage());
}


  



?>