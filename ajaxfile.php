<?php
require_once('Modell/mysqliteconnection.php');
require_once('Modell/CreateTableUser.php');

$request = $_POST['request'];


if($request == 1){
  $active = $_POST['sellerID'];
  $username = $_POST['username'];

  $return_val = "";
  if($active == "active"){
    $return_val = "active";
  }else{
    $return_val = "inactive";
  }
  $result2 = new DAOuser();

  $table="account";
  
  $result = $result2 -> updateUser($table,$active,$username);

  
  echo $return_val;
  exit;
}


if($request == 2){
  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if ($username != "" && $password != ""){

  $result1=$result2 ->countUser($table,$password,$username)

    if($result1 > 0){
       $_SESSION['username'] = $username;
       echo "active";
    }else{
       echo "inactive";
    }

  }
  exit;
}
?>