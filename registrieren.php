 
<?php      
     

 require('elements/header.php');
require('src/CheckData.php');


$errors[] = null ;
$error = null ;
$success = null ;
$result1 = null ;
$result2 = null ;
$check1 = null ;
$check2 = null ;

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
 
    <?php if($success):  ?>
    
    <?php   
        
 require_once('mysqliteconnection.php');

 $host = "localhost";
 $name = "shop";
 $user = "root";
 $passwort = "";
 $table = "account";
 try{
     $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
   //  $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
     
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
    
  if(empty($errors['username'])){
  $stmt = $mysql->prepare('SELECT * FROM account WHERE username = ?'); //Username überprüfen
   //   $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute([ $_POST["username"]]);
      $result1 = $stmt->fetchObject();
      var_dump($result1);
      if($result1){
        $check1 = true ;
        die("  There is the User with dies Name ");
      }
  }
  
  if(empty($errors['email'])){



    $stmt2 = $mysql->prepare('SELECT id FROM account WHERE email = ?'); //Username überprüfen
     //   $stmt->bindParam(":user", $_POST["username"]);
        $stmt2->execute([ $_POST["email"]]);
        $result2 = $stmt2->fetchObject();
        if($result2){
          $check2 = true ;
        die(  "There is the User with dies E-Mail" );
        }
        
       
    }


  if(  !$check1 &&  !$check2  ){
     session_start();
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $stmt = $mysql->prepare("INSERT INTO account 
    SET username = ? , email = ? , street = ?, postcode = ?,
    city = ? , pwd = ? ");
    $stmt->execute([ $_POST["username"],$_POST["email"],$_POST["street"],
    $_POST["postcode"] ,  $_POST["city"],  $password]);

    $_SESSION['email'] = $_POST["email"] ;
    $_SESSION['password'] = $_POST["password"] ; 
  


 //   
 //  street,postcode,city,pwd,confirmation_token) 
 //  VALUES (:username,  :email, :street,:postcode,:city,:pwd,:confirmation_token)");
  // $stmt->bindParam(":username", $_POST["username"]);
  // $stmt->bindParam(":email", $_POST["email"]);
  // $stmt->bindParam(":street", $_POST["street"]);
  // $stmt->bindParam(":postcode", $_POST["postcode"]);
  // $stmt->bindParam(":city", $_POST["city"]);
  // $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
  // $stmt->bindParam(":pwd", $hash);
  // $stmt->bindParam(":confirmation_token", $token);
  // $stmt->execute();
   $user_ID = $mysql->lastInsertID();
    //mail($_POST['email'], 'Confirmation of your account',"In Order to Validate your account pleace click on this link\n\nhttp://localhost/webprogrammierung/onlineshopping/confirme.php?id= $user_ID&token=$token");

   echo "Your Account hat been successfully created";
   header("location: login.php");
   exit();
  }else {
      if($check1 ){
        echo "This user already exists";
      }
      if($check2 ){
        echo "This E-Mail already exists"; 
      }
  }
 

 } catch (PDOException $e){
  //   echo "SQL Error: ".$e->getMessage();
 }


   ?>
        
   <?php endif ?>
     
 <div class="centerReg"> 
                  
                  <?php if($error):  ?>
                     <div class="alert alert-danger" role="alert">
                         Invalide
                     </div>
                     <?php endif ?>
       <form action=""  method="POST" class="mb-4" > 
  <legend text-align: center  > <h1>  Account</h1>   </legend>  
  <div class="form-group" >      
 <label for="name"> Your name: </label>  
  <input  value=" <?= isset($_POST['username'])? htmlentities($_POST['username']): '' ?>" style="width:65%" type="text" id="name" name="username"  class="form-control <?= isset($errors['username'])? 'is-invalid' : ''    ?>"  placeholder=" Your Name " >
     <?php if(isset($errors['username'])): ?>      
       <div class="invalid-feedback">  <?= $errors['username'] ?> </div>           
    <?php endif  ?>
  </div>
  <div class="form-group">
    <label for="email">  Email:   </label>
    <input  value=" <?= isset($_POST['email'])? htmlentities($_POST['email']): '' ?>" style="width:65%" type="email" id="email" class="form-control  <?= isset($errors['email'])? 'is-invalid' : ''    ?> " name="email" placeholder=" Your E-Mail">
    <?php if(isset($errors['email'])): ?>      
       <div class="invalid-feedback">  <?= $errors['email'] ?> </div>           
    <?php endif  ?>
  </div>
   

   <div class="form-group">
   <label for="street"> Your Street:  </label> 
  <input style="width:65%" value=" <?= isset($_POST['street'])? htmlentities($_POST['street']): '' ?>" type="text" id="street" class="form-control  <?= isset($errors['street'])? 'is-invalid' : ''    ?> " name="street" placeholder="Your Street ">
  <?php if(isset($errors['street'])): ?>      
       <div class="invalid-feedback">  <?= $errors['street'] ?> </div>           
    <?php endif  ?>
   </div>
   <div class="form-group">
<label for="invalid" > Your Post Code: </label>  
<input style="width:65%" value=" <?= isset($_POST['postcode'])? htmlentities($_POST['postcode']): '' ?>"  id="invalid" type="text"  class="form-control   <?= isset($errors['postCode'])? 'is-invalid' : ''    ?> " name="postcode" placeholder="Your Post Code "  >
<?php if(isset($errors['postCode'])): ?>      
       <div class="invalid-feedback">  <?= $errors['postCode'] ?></div>           
    <?php endif  ?>
</div>
<div class="form-group">
<label for="city"> Your City: </label>  
 <input style="width:65%" value=" <?= isset($_POST['city'])? htmlentities($_POST['city']): '' ?>" id ="city" type="text"  class="form-control  <?= isset($errors['city'])? 'is-invalid' : ''    ?>" name="city" placeholder="Your City ">
 <?php if(isset($errors['city'])): ?>      
       <div class="invalid-feedback">  <?= $errors['city'] ?> </div>           
    <?php endif  ?>
</div>  
 <div class="form-group">         
 <label for="password"> Your Password:</label>
                  <input style="width:65%"  type="password"  class="form-control  <?= isset($errors['password'])? 'is-invalid' : ''    ?>" id="password" name="password" placeholder="Your Password ">
                  <?php if(isset($errors['password'])): ?>      
       <div class="invalid-feedback">  <?= $errors['password'] ?></div>           
    <?php endif  ?>
               </div>
                  <div class="form-group">
                  <label for="confirm"> Confirm your Password:</label> 
                  <input style="width:65%" type="password"  id ="confirm" class="form-control <?= isset($errors['confirmation'])? 'is-invalid' : ''    ?>" name="confirmation" placeholder="confirmed Your Password ">
                  <?php if(isset($errors['confirmation'])): ?>      
       <div class="invalid-feedback">  <?= $errors['confirmation'] ?>  </div>          
    <?php endif  ?>
               </div>
 <button >submit</button>
</form>
 </div> 
               
       
       <?php  require('elements/footer.php')        ?>