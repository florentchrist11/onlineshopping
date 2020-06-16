
<?php 

$host = "localhost";
$name = "shop";
$user = "root";
$passwort = "";
$table = "Product";

  //  $mysql = new PDO("mysqli:host=$host;dbname=$name", $user, $passwort);
  $mysql = new mysqli($host,  $user , $passwort ,$name  );
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
     $mysql->query($sqlTable);
   
if ($mysql->query( $sqlTable) === TRUE) {
   echo "Table   created successfully";
 } else {
   
 }









?>