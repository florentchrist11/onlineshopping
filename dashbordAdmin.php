<?php  
require_once 'elements/header.php';
 require_once('DAOuser.php');    
 require_once('mysqliteconnection.php');
 require_once('CreateTableUser.php');   


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
                  
                <td> <button id="block"> Block </button>
                     <button id="frei"> Frei </button>
                </td>
                
             </tr> 
         <?php 
         $table = "account";
         $table2="produkt"
        $field = 'username';
  
  $result2 = new DAOuser();
 
  $result1 = $result2 ->countRow($table, $field);
  $result= } ?>
         </tbody>
         </table>
         <?php }   ?>
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
    
<?php   require('elements/footer.php')  ?> 