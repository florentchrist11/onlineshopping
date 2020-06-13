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

   <?php  /* if($result) :            ?>   
 <?php  foreach ($result as $k  => $value):  ?>
   
   <div class="well-sm col-md-offset-3">
 <div class="row text-center py-5"  >
       <div class="col-md-3 col-sm-6 my-3 my-md-0">
       <form action="" method="POST">
       <div class="card shadow">
       <img src="<?= $value['Myimage'] ; ?>" alt="image" 
             class="img-fluid card-img-top">          
               
                 <div class="card-body">
                  <h5 class="card-title"><strong><?= $value['username'] ?></strong></h5>
                  <h6>
                  <i class='far fa-star' style='font-size:30px;color:greenyellow' ></i>
                  <i class='far fa-star' style='font-size:30px;color:greenyellow'></i>
                  <i class='far fa-star' style='font-size:30px;color:greenyellow'></i>
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
       </div><br><br
 
  <?php  endforeach    ?>
  
  <?php    endif   */          ?>
  
    <div class="well-sm col-md-offset-3">
  <div class="card mb-3" >
  <form action="" method="POST">
  <img src="uploads/web.PNG" alt="Girl in a jacket" width="700"   height="300">
  <div class="card-body">
    <h5 class="card-title">  <strong>Product Title:</strong></h5>
    <h5 class="card-title"> <strong> Price:</strong></h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <h5 class="card-title">  <strong>Contact:</strong></h5>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    <button type="submit" class="btn btn-warning my-3" name="add" > Add to Card  </button>
  </div>
</div>
   
</div>


<div class="well-sm col-md-offset-3">
  <div class="card mb-3" >
  <form action="" method="POST">
  <img src="uploads/web.PNG" alt="Girl in a jacket" width="700"   height="300">
  <div class="card-body">
    <h5 class="card-title">  <strong>Product Title:</strong></h5>
    <h5 class="card-title"> <strong> Price:</strong></h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <h5 class="card-title">  <strong>Contact:</strong></h5>
   
    <button type="submit" class="btn btn-warning my-3" name="add" > Add to Card  </button>
  </div>
</div>
</div>  




  <?php    require('elements/footer.php')        ?>








  


