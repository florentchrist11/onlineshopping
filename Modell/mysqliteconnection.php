<?php
  try {
    $db = new PDO('sqlite:bd_shops.sqlite3');
  } catch (SQLite3 $e) {
    //  die("La création ou l'ouverture de la base [$base] a échouée ".
        //  "pour la raison suivante: ".$e->getMessage());
  }
?>