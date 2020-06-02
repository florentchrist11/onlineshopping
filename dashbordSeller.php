
<?php   require('elements/header.php')  ;
require('src/CheckProduct.php');
$errors[] = null ;
$error = null ;
$success = null ;

if(isset($_POST['name'],$_POST['price'],$_POST['stk'], $_POST['image'] , $_POST['description'] )){

   
 $data = new CheckProduct($_POST['name'],$_POST['price'],$_POST['stk'],$_POST['image'],$_POST['description']);

      
if($data->is_Valider()){
       $success = true ;
     
       
        }else{
      
         $errors = $data->getError();
         $error = true ;

       
        } 
       }

?>

        <div class="rand"> 
           <div class="navbar">
           <a class="glyphicon glyphicon-user"  href="Profil.php"> Profil</a> 
           <a class="fa fa-bell" style="font-size:24px"> Delete </a>
           <a class="fa fa-gift" style="font-size:24px"> Update</a>
        </div>
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-plus"></i> Add New Product</strong>
            </div>
            <div class="card-body">
                <form action="" method="post">
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Name </label>
                            <input type="text" class="form-control" id="name" name="username" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Preis </label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qty" class="col-form-label">Stückzahl </label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="stückzahl" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Image </label>
                            <input type="file" class="form-control" name="Myimage" id="image" placeholder="Image URL">
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="image" class="col-form-label">description  </label>
                        <textarea name="Idescription" id="" rows="5" class="form-control" placeholder="beschreibung"></textarea>
                    </div> 
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Hinzufügen</button>
                </form>
            </div>
        </div>


<?Php 

require('mysqliteconnection.php');

    $host = "localhost";
    $name = "shop";
    $user = "root";
    $passwort = "";
    $table = "Produkt";
    try{
        $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
        $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
   $sqlTable = "CREATE TABLE IF NOT EXISTS  $table  (
    
       id INT  AUTO_INCREMENT,
       username VARCHAR(20),
       price VARCHAR(20),
       qty VARCHAR(50),
       Myimage VARCHAR(50),
       Idescription VARCHAR(50),
       CONSTRAINT id PRIMARY KEY (id)
       )";
         $mysql->exec($sqlTable);
     
     if(isset($_POST['username'],$_POST['price'],$_POST['qty'], $_POST['Myimage'] , $_POST['Idescription'])){
               
               $stmt = $mysql->prepare("INSERT INTO Produkt (username, price, qty,Myimage,Idescription) 
               VALUES (:username,  :price, :qty,:Myimage,:Idescription)");
               $stmt->bindParam(":username", $_POST["username"]);
               $stmt->bindParam(":price", $_POST["price"]);
               $stmt->bindParam(":qty", $_POST["qty"]);
               $stmt->bindParam(":Myimage", $_POST["Myimage"]);
               $stmt->bindParam(":Idescription", $_POST["Idescription"]);
               $stmt->execute();
               echo "Dein Produkt wurde angelegt";

           } else {
             echo "Produkt existiert schon";
           }
     
    } catch (PDOException $e){
        echo "SQL Error: ".$e->getMessage();
    }
   
   
      ?>
     
  
<?php   require('elements/footer.php')   ?>

