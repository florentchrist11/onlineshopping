<?php
require_once('Modell/mysqliteconnection.php');
require_once('Modell/CreateTableUser.php');
require('Modell/DAOuser.php');

$result2 = new DAOuser();
$request = $_POST['request'];


if($request == 1){
  $active = $_POST['active'];
  $username = $_POST['username'];

  $val = "";
  if($active == "active"){
    $val= "inactive";
  }else{
    $val = "active";
  }
  

  $table="account";
  
  $result = $result2 -> updateUser($table,$val,$username);

  
  echo $val;
  
}else{
  $id = $_POST['id'];

  $table="Product";
  $field = 'username';
  $result = $result2 -> deleteRowFromDb($table,$id,$field); 
  echo $result ;
  
}

?>