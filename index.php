<?php

    $result = null ;
    $result1 = null ;
  require_once 'elements/header.php';
  require_once('DAOuser.php');    
  require_once('mysqliteconnection.php');
  require_once('CreateTableProduct.php');


$result2 = new DAOuser();
 $table = "product";
$result1 = $result2 -> getAllProduct($table);

?>

     
       <form action="" class=" col-md-offset-3">
       <label for="search"> Search product   </label><br>
       <input type ="text" id ="Search" placeholder="Search..">
       <button type="search" name="search">Suchen </button> 
           
 </form><br><br>

<?php   if($result1) :            ?>   
 <?php  foreach ($result1 as $k  => $value):  ?>
   
  
    <div class="well-sm col-md-offset-3">
   <div class="card mb-3" >
   <form action="" method="POST">
   <h5 class="card-title">  <strong>Product Title: <strong ><?= $value['username'] ?></strong> </strong></h5>
   <img src="<?= $value['Myimage']  ?>" alt="Girl in a jacket" width="700"   height="300">
   <div class="card-body">
    <h5 class="card-title"> <strong> Price: <strong class="price"><?= $value['price'] ?></strong> $ </strong></h5>
    <p class="card-text"> <strong ><?= $value['Idescription'] ?></strong> </p>
    <h5 class="card-title">  <strong>Contact?????</strong></h5>
    <button type="submit" style="width:70%" class="btn btn-warning my-3" name="add" > Add to Card  </button>
    <input type="hidden" name="product_id" value="<?= $value['id'] ?>" >
    </div>
   </form>
</div>  
</div><br><br><br>

<?php  endforeach    ?>
  
  <?php    endif       ?>





  <?php    require('elements/footer.php')        ?>


