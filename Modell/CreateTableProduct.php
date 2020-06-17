
<?php 

$stmt = new PDO('sqlite:bd_shops.sqlite3');
$table = "product";
    
$sqlTable = "CREATE TABLE IF NOT EXISTS  $table  (
    id INT  AUTO_INCREMENT,
    username VARCHAR(20),
    price VARCHAR(20),
    qty VARCHAR(50),
    Myimage VARCHAR(50),
    Idescription VARCHAR(50),
    CONSTRAINT id PRIMARY KEY (id)
   )";
   
$stmt->exec($sqlTable);

?>