<?php
    $result = null ;
    $result1 = null ;
    

require_once 'elements/header.php';


require_once('mysqliteconnection.php');

$host = "localhost";
$name = "shop";
$user = "root";
$passwort = "";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
    $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
    
$stmt = $mysql->prepare('SELECT * FROM Produkt '); 
    $stmt->execute();
    $result = $stmt->fetchAll();
  
    
  
} catch (PDOException $e){
   //  echo "SQL Error: ".$e->getMessage();
 }

?>

     
       <form action="" class=" col-md-offset-3">
       <label for="search"> Search product   </label><br>
       <input type ="text" id ="Search" placeholder="Search..">
       <button type="search" name="search">Suchen </button> 
           
 </form><br><br>

      
 <?php  foreach ($result as $k  => $value):  ?>
   
   <div class=" col-md-offset-3">
 <div class="row text-center py-5"  >
       <div class="col-md-3 col-sm-6 my-3 my-md-0">
       <form action="" method="POST">
       <div class="card shadow">
       <img src="<?= $value['Myimage'] ; ?>" alt="image" 
             class="img-fluid card-img-top">          
               
                 <div class="card-body">
                  <h5 class="card-title"><strong><?= $value['username'] ?></strong></h5>
                  <h6>
                  <i class='far fa-star' style='font-size:30px;color:yellow' ></i>
                  <i class='far fa-star' style='font-size:30px;color:yellow'></i>
                  <i class='far fa-star' style='font-size:30px;color:yellow'></i>
                  </h6> 
                  <p class="card-text">
                  <?= $value['Idescription'] ?>
                  </p>  
                  <small><S class="text-secondary">$50</S></small> 
                  <strong class="price"><?= $value['price'] ?></strong> 
                  <button type="submit" class="btn btn-warning my-3" name="add"> Add to Card  </button>
                  <input type="hidden" name="product_id" value="<?= $value['id'] ?>" >
               </div> 
     
     </div>
       </form>
       </div>
       </div>
      
       
 
  <?php  endforeach    ?>

  







  


