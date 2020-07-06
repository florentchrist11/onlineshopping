<?php  
require_once 'elements/header.php';
 require_once('Modell/DAOuser.php');    
 require_once('Modell/mysqliteconnection.php');
 require_once('Modell/CreateTableUser.php');   


?>

<body>
<div class="rand">
    <div id ="div1">
          <h3> List of all Seller </h3>
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
              <th colspan="5"> Seller_ID </th>
              <th > Aktion </th>
            </tr>
            </thead>
            <tbody>
<?php            
         foreach ($result as $account){ 
            $activeText = "";
          if($account['token']!= null){ 
             if($account['sellerID']=="active"){
                $activeText="active";
             }else{
                $activeText="inactive";
             }
             }else{
                $activeText=null;  
             } 
             if($activeText!=null) { ?>
             <tr> 
               <td> <?= $account['username'] ?> </td>
               <td colspan="5"> <?= $account['token'] ?> </td>
                <td> 
                 <button id = <?= $account['username'] ?> class="frei"><?=$activeText?></button>
                 </td>
<?php  } ?>               
             </tr> 
             <?php }   ?>
  <?php 
         $table ="account";
         $table2="product";
         $field = 'token';
         $field2 = 'Myimage';
  $result1 = $getUser ->countRow($table, $field);
  $result2 = $getUser ->countRow($table2,$field2);
  } ?>
         </tbody>
         </table>
         
         <script>
         
          </script>
 <div id ="div">
         <h5> current number of seller </h5> <div id="number"><?= $result1['count(*)'] ?>&nbsp<i class="fa fa-user" id="test"> </i> </div> </div>
     <div id ="div">  
        <h5> New seller </h5> <div id="number"> <i class="fa fa-user" id="test2"></i>
     </div>
     </div>
     <div id ="div">
        <h5> current number of product </h5> <div id="number"><?= $result2['count(*)'] ?>&nbsp<i class='fa fa-shopping-bag' id="test"></i>
    </div>
    </div>
     <div id ="div">
        <h5> New product</h5> <div id="number"><i class='fa fa-shopping-bag' id="test2"></i>
    </div>
    </div>
    
</div>
<div id ="user_data"> </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/Javascript"> 

$(document).ready(function(){
  
    $('.frei').click(function(){
    var id = this.id;
    var username = this.id;
    var activeText = $(this).text();

   console.log(username);
    var active = '';
    if(activeText == "active"){
      active = "active";
      $("#"+id).css("color", "red");
    }else{
      active = "inactive";
      $("#"+id).css("color", "green");
     }
    $.ajax({
      url: 'ajaxfile.php',
      type: 'post',
      data: {username: username,active: active,request: 1},
      success: function(response){
        $("#"+id).html(response);
      }
    });
  });
});
</script>

    
<?php   require('elements/footer.php')  ?> 