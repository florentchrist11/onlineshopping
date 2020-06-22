<?php  
require_once 'elements/header.php';
 require_once('Modell/DAOuser.php');    
 require_once('Modell/mysqliteconnection.php');
 require_once('Modell/CreateTableUser.php');   


?>

<body>
<div class="rand">
    <div id ="div1">
          <h3> List of user  </h3>
    </div> 
 <?php 

$getUser = new DAOuser();
 $table = "account";
$result = $getUser -> getAllProduct($table);

 ?>
 
 <?php
     if(!empty($result)){ ?>

         <table id ="user"> 
           <thead>
            <tr>
              <th > Username </th>
              <th colspan="5"> E-mails </th>
              <th > Aktion </th>
            </tr>
            </thead>
            <tbody>
<?php            
         foreach ($result as $account){  ?>
             <tr> 
               <td > <?= $account['username'] ?> </td>
                <td colspan="5"> <?= $account['email'] ?> </td>
              
                <td> 
                  <a href="dashbordAdmin.php?Value = <?= $account['username'] ?>"> <input type="submit" id = <?= $account['username'] ?> class="block" value="block"></a>
                  <a href="dashbordAdmin.php?Value = <?= $account['username'] ?>"> <input type="submit" id = <?= $account['username'] ?> class="frei" value="frei"></a>
            
                </td>
                
             </tr> 
             <?php }   ?>
         <?php 
         $table ="account";
         $table2="produkt";
        $field = 'username';
  
  $result2 = new DAOuser();
 
  $result1 = $result2 ->countRow($table, $field);
  } ?>
         </tbody>
         </table>
         
         <script>
         
          </script>
 <div id ="div">
         <h5> Number of aktuel User </h5> <div id="number"><?= $result1['count(*)'] ?> <i class="fa fa-user" id="test"> </i> </div> </div>
     <div id ="div">  
        <h5> New User </h5> <div id="number"> <i class="fa fa-user" id="test2"></i>
     </div>
     </div>
     <div id ="div">
        <h5>  Number of aktuel produkt</h5> <div id="number"><i class='fa fa-shopping-bag' id="test"></i>
    </div>
    </div>
     <div id ="div">
        <h5> New produkt</h5> <div id="number"><i class='fa fa-shopping-bag' id="test2"></i>
    </div>
    </div>
    
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/Javascript"> 

$(document).ready(function(){

    $(".block").click(function(){
        <?php
$pdo = new DAOuser();
 
$statement = $pdo->prepare("DELETE FROM users WHERE username = NULL");
$statement->execute(); //Löscht Benutzer mit ID 1
?>
     
    });

    $(".frei").click(function(){
        console.log( this.id);
    });

});
</script>
    
<?php   require('elements/footer.php')  ?> 