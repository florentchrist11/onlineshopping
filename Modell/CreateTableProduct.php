
<?php 

$host = "localhost";
$name = "shop";
$user = "root";
$passwort = "";
$table = "Product";

 

$file_db = new PDO('sqlite:bd_shops.sqlite3');                                                                
$base = 'bd_shops.sqlite3';

try {
  $db = new SQLite3($base);
} catch (SQLite3 $e) {
//  die("La création ou l'ouverture de la base [$base] a échouée ".
     //  "pour la raison suivante: ".$e->getMessage());
}
 // $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  //  $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
    
$sqlTable = "CREATE TABLE IF NOT EXISTS  $table  (
    
    id INT  AUTO_INCREMENT,
    username VARCHAR(20),
    price VARCHAR(20),
    qty VARCHAR(50),
    Myimage VARCHAR(50),
    Idescription VARCHAR(50),
    CONSTRAINT id PRIMARY KEY (id)
    
   )";
     $db->query($sqlTable);
   
if ($db->query( $sqlTable) === TRUE) {
  
 } else {
   
 }









?>