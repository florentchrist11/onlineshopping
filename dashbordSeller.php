<?php 



require('src/CheckProduct.php');
$errors[] = null ;
$error = null ;
$success = null ;
$test = false ;

if(isset($_POST['signup'])){

   
 $data = new CheckProduct($_POST['username'],$_POST['qty']
 ,$_POST['price'],$_POST['Idescription']);


      
if($data->is_Valider()){
       $success = true ;
     
       
        }else{
      
         $errors = $data->getError();
         $error = true ;

       
        } 
       }
 ?>
       <?php if($success):  ?>
               
        <?php
        $test = true ;
require_once("Modell/InsertProduct.php");

?>
        
   <?php endif ?>

<?php    require('elements/header.php')  ;
require_once('Modell/DAOuser.php');    
require_once('mysqliteconnection.php');
require_once('CreateTableUser.php');         ?>
<br><br><br><br>
<div class="rand"> 

<div id ="div1">
          <h3> List of Produkt  </h3>
</div> 
 <?php 
 $table = "product";
$getUser = new DAOuser();
$result = $getUser -> getAllProduct($table);

 ?>
<?php  if(!empty($result)){ ?>

<table id ="user"> 
  <thead>
   <tr>
     <th colspan="5"> Price </th>
     <th colspan="5" > Quantity </th>
     <th colspan="6"> Image </th>
   </tr>
   </thead>
   <tbody>
<?php            
foreach ($result as $account){  ?>
    <tr> 
      <td colspan="5" id = <?= $account['username'] ?> > <?= $account['price'] ?> </td>
       <td colspan="5" id = <?= $account['username'] ?> > <?= $account['qty'] ?> </td>
         
       <td colspan="6"> 
       <button class="block" id = <?= $account['username'] ?>> Delete </button> <?= $account['Myimage'] ?>
       </td>
       
    </tr> 
<?php 
 } ?>
</tbody>
</table>
<?php }   ?>
 


                     <?php if($error):  ?>
                     <div class="alert alert-danger" role="alert">
                         Invalide
                     </div>
                     <?php endif ?>

                     <?php if(  $test && $failure):  ?>
                     <div class="alert alert-danger" role="alert">
                    <?=      $message      ?>
                     </div>
                     <?php  elseif($test && $successInsert) : ?>
                        <div class="alert alert-success" role="alert">
                    <?=      $message      ?>
                     <?php endif ?>


        <div class="card border-danger">
            
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data" >
                
                        <div class="form-group col-md-6">
                            <label for="username" class="col-form-label">Name </label>
                            <input type="text" class="form-control" id="name" name="username" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Preis </label>
                            <input  value=" <?= isset($_POST['price'])? htmlentities($_POST['price']): '' ?>" style="width:65%" type="number" id="price" name="price"  class="form-control <?= isset($errors['price'])? 'is-invalid' : ''    ?>" placeholder="In Euro" >

                            <?php if(isset($errors['price'])): ?>      
                           <div class="invalidText">  <?= $errors['price'] ?> </div>           
                           <?php endif  ?>
                        
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qty" class="col-form-label">Stückzahl </label>
                            <input  value=" <?= isset($_POST['qty'])? htmlentities($_POST['qty']): '' ?>" style="width:65%" type="number" id="qty" name="qty"  class="form-control <?= isset($errors['qty'])? 'is-invalid' : ''    ?>" placeholder="quantity" >

                           <?php if(isset($errors['qty'])): ?>      
                           <div class="invalidText">  <?= $errors['qty'] ?> </div>           
                           <?php endif  ?>                        </div>
                        <div class="form-group col-md-4">
                            <label for="Myimage" class="col-form-label">Image </label>
                            <input type="file" class="form-control" name="Myimage" id="image"  placeholder="Image URL">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="Idescription" class="col-form-label">description  </label>
                        <textarea name="Idescription" id="" rows="5" class="form-control" placeholder="description"></textarea>
                    </div> 
                    <button type="submit" name="signup" class="btn btn-success"><i class="fa fa-check-circle"></i> Hinzufügen</button>
                </form>
            </div>
        </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/Javascript"> 

$(document).ready(function(){
  
    $('.block').click(function(){
    var id = this.id;
    var $element = $(this).parent().parent();
    console.log(id);

    $.ajax({
      url: 'ajaxfile.php',
      type: 'post',
      data: {id: id,request: 2},
      success: function(response){
        $element.fadeOut().remove();
      }
    });

    });
    });
</script>