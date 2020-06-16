<?php 



require('src/CheckProduct.php');
$errors[] = null ;
$error = null ;
$success = null ;

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
require_once("Modell/InsertProduct.php")
?>
        
   <?php endif ?>

<?php    require('elements/header.php')  ;       ?>
<br><br><br><br>
<div class="rand"> 
                     <?php if($error):  ?>
                     <div class="alert alert-danger" role="alert">
                         Invalide
                     </div>
                     <?php endif ?>
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-plus"></i> Add New Product</strong>
            </div>
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

