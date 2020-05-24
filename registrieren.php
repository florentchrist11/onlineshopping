 
<?php  require('elements/header.php')  ; 

require('src/CheckData.php');

/*
@florent fokou 

*/

$errors[] = null ;
$error = null ;
$success = null ;

if(isset($_POST['username'],$_POST['email'],$_POST['street'], $_POST['postcode'] , $_POST['city'], $_POST['password'] 
, $_POST['confirmation'])){

 $data = new CheckData($_POST['username'],$_POST['email'],$_POST['street'],$_POST['postcode'] , $_POST['city'], 
       $_POST['password'], $_POST['confirmation']);

      
if($data->is_Valider()){
       $success = true ;
     
       
        }else{
      
         $errors = $data->getError();
         $error = true ;

       
        } 
       }
     
?>
       
 <div class="centerReg"> 
                  
 <?php if($error):  ?>
    <div class="alert alert-danger" role="alert">
        Invalide
    </div>
    <?php endif ?>
    <?php if($success):  ?>
    <div class="alert alert-success"role="alert"> 
        Valide
    <?php   
        
 require('mysqliteconnection.php');

 $host = "localhost";
 $name = "shop";
 $user = "root";
 $passwort = "";
 $table = "account";
 try{
     $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
     $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     
$sqlTable = "CREATE TABLE IF NOT EXISTS  $table  (
 
    id INT  AUTO_INCREMENT,
    username VARCHAR(20),
    email VARCHAR(20),
    street VARCHAR(50),
    postcode INT,
    city VARCHAR(50),
    pwd VARCHAR(50),
    CONSTRAINT id PRIMARY KEY (id)
    )";
      $mysql->exec($sqlTable);
    
if ($mysql->query( $sqlTable) === TRUE) {
    echo "Table   created successfully";
  } else {
    echo "Error creating table: " . $mysql->error;
  }
    
  $stmt = $mysql->prepare("SELECT * FROM account WHERE username = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 0){
        //Username ist frei
        $stmt = $mysql->prepare("SELECT * FROM account WHERE email = :email"); //Email überprüfen
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 0){
            //User anlegen
            $stmt = $mysql->prepare("INSERT INTO account (username, email, street,postcode,city,pwd) 
            VALUES (:username,  :email, :street,:postcode,:city,:pwd)");
            $stmt->bindParam(":username", $_POST["username"]);
            $stmt->bindParam(":email", $_POST["email"]);
            $stmt->bindParam(":street", $_POST["street"]);
            $stmt->bindParam(":postcode", $_POST["postcode"]);
            $stmt->bindParam(":city", $_POST["city"]);
            $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $stmt->bindParam(":pwd", $hash);
            $stmt->execute();
            echo "Dein Account wurde angelegt";
         
        } else {
          echo "Email bereits vergeben";
        }
      } else {
        echo "Der Username ist bereits vergeben";
      }
   

 } catch (PDOException $e){
     echo "SQL Error: ".$e->getMessage();
 }


   ?>

 
        
    </div>
    <?php endif ?>
       <form action=""  method="POST" class="mb-4" > 
  <legend style="color:chartreuse"  text-align: center  > <h1  >  Account</h1>   </legend>  
  <div class="form-group" >      
 <label style="color:blueviolet"> Your name:   </label>
  <input  value=" <?= isset($_POST['username'])? htmlentities($_POST['username']): '' ?>" style="width:65%" type="text"  name="username"  class="form-control <?= isset($errors['username'])? 'is-invalid' : ''    ?>"  placeholder=" Your Name " >
     <?php if(isset($errors['username'])): ?>      
       <div class="invalid-feedback">  <?= $errors['username'] ?>  </div>           
    <?php endif  ?>
  </div>
  <div class="form-group">
    <label style="color:blueviolet">  Email:   </label>
   
    <input  value=" <?= isset($_POST['email'])? htmlentities($_POST['email']): '' ?>" style="width:65%" type="email" class="form-control  <?= isset($errors['email'])? 'is-invalid' : ''    ?> " name="email" placeholder=" Your E-Mail">
    <?php if(isset($errors['email'])): ?>      
       <div class="invalid-feedback">  <?= $errors['email'] ?>  </div>           
    <?php endif  ?>
  </div>
   

   <div class="form-group">
   <label style="color:blueviolet"> Your Street:   </label>
  <input style="width:65%" value=" <?= isset($_POST['street'])? htmlentities($_POST['street']): '' ?>" type="text"  class="form-control  <?= isset($errors['street'])? 'is-invalid' : ''    ?> " name="street" placeholder="Your Street ">
  <?php if(isset($errors['street'])): ?>      
       <div class="invalid-feedback">  <?= $errors['street'] ?>  </div>           
    <?php endif  ?>
   </div>
   <div class="form-group">
<label style="color:blueviolet"> Your Post Code:   </label>
<input style="width:65%" value=" <?= isset($_POST['postcode'])? htmlentities($_POST['postcode']): '' ?>"  id="invalid" type="text"  class="form-control   <?= isset($errors['postCode'])? 'is-invalid' : ''    ?> " name="postcode" placeholder="Your Post Code "  >
<?php if(isset($errors['postCode'])): ?>      
       <div class="invalid-feedback">  <?= $errors['postCode'] ?>  </div>           
    <?php endif  ?>
</div>
<div class="form-group">
<label style="color:blueviolet"> Your City:   </label>
 <input style="width:65%" value=" <?= isset($_POST['city'])? htmlentities($_POST['city']): '' ?>" type="text"  class="form-control  <?= isset($errors['city'])? 'is-invalid' : ''    ?>" name="city" placeholder="Your City ">
 <?php if(isset($errors['city'])): ?>      
       <div class="invalid-feedback">  <?= $errors['city'] ?>  </div>           
    <?php endif  ?>
</div>  
 <div class="form-group">         
 <label style="color:blueviolet"> Your Password:   </label>
                  <input style="width:65%" value=" <?= isset($_POST['password'])? htmlentities($_POST['password']): '' ?>" type="password"  class="form-control  <?= isset($errors['password'])? 'is-invalid' : ''    ?>" name="password" placeholder="Your Password ">
                  <?php if(isset($errors['password'])): ?>      
       <div class="invalid-feedback">  <?= $errors['password'] ?>  </div>           
    <?php endif  ?>
               </div>
                  <div class="form-group">
                  <label style="color:blueviolet"> Confirm your Password:   </label>
                  <input style="width:65%" value=" <?= isset($_POST['confirmation'])? htmlentities($_POST['confirmation']): '' ?>"type="password"  class="form-control <?= isset($errors['confirmation'])? 'is-invalid' : ''    ?>" name="confirmation" placeholder="confirmed Your Password ">
                  <?php if(isset($errors['confirmation'])): ?>      
       <div class="invalid-feedback">  <?= $errors['confirmation'] ?>  </div>           
    <?php endif  ?>
               </div>
<button style="color:blueviolet" >submit</button>
</form>
 </div> 
       
  
       
       <?php  require('elements/footer.php')        ?>