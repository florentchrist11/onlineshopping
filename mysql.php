<?php
<<<<<<< HEAD

=======
  
>>>>>>> 258eb4c6c6dbb1bc5827abdaccae6d52d4ba6246
$host = "localhost";
$name = "shop";
$user = "root";
$passwort = "";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
 ?>