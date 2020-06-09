<!--Anne Lecdou-->
<?php  
include('mysqliteconnection.php');
require('elements/header.php')     


?>
<body>
<div class="rand">
     <div id ="div">
         <h5> Number of aktuel User </h5><i class="fa fa-user" style="font-size:20px"></i>  </div>
     <div id ="div">  
        <h5> New User </h5><i class="fa fa-user" style="font-size:23px; color: red"></i>
     </div>
     <div id ="div">
        <h5> aktuel number of produkt</h5><i class='fas fa-shopping-bag' style='font-size:20px'></i></div>
     
      <div id ="div">
        <h5> New produkt</h5><i class='fas fa-shopping-bag' style='font-size:20px; color: red'></i>
    </div>
    <div id ="div1">
          <h3> List of user  </h3> </div>
   
          <?php 

$host = "localhost";
$name = "shop";
$user = "root";
$passwort = "";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
    $mysql->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $mysql->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
    
    $stmt = $mysql->prepare('SELECT * FROM account '); 
    $stmt->execute();
    $result = $stmt->fetchAll();
      
}catch (PDOException $e){
        //  echo "SQL Error: ".$e->getMessage();
 }
 ?>
 
 <?php
     if(!empty($result)){ ?>

         <table id ="user"> 
           <thead>
            <tr>
              <th> Username </th>
              <th> E-mails </th>
              <th> Aktion </th>
            </tr>
            </thead>
            <tbody>
<?php            
         foreach ($result as $account){  ?>
             <tr> 
               <td> <?= $account['username'] ?> </td>
                <td> <?= $account['email'] ?> </td>
                <td> <button id="button">Button <i class="fa fa-edit"></i></button></td>
             </tr> 
         <?php }    ?>
         </tbody>
         </table>
         <?php }   ?>
</div>
</body>
    
<?php   require('elements/footer.php')  ?> 