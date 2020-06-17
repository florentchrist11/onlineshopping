
 
  <?php 

  $title = "Login";
   require('Modell/DAOuser.php');

    $error = null ;
    $check = false ;
    $result1 = null ;
    $test = false ;
    $check1 = false ;
    $error = null ;
    $result2 = null ;
    $result3 = null ;
    
  
   if(isset($_POST['username'], $_POST['passwort'], $_POST['sellerID'])){
         
    require_once('Modell/mysqliteconnection.php');
    require_once('Modell/CreateTableUser.php');
   
   
   $fields = 'username';
   $value = $_POST['username'];

  $result2 = new DAOuser();
 

  $result3 = $result2 -> getTaskCountByProject( $fields , $value) ;
    
   
   $fields = 'token';
   $value = $_POST['username'];


  $result1 = $result2 ->getTaskCountByProject( $fields , $value) ;

       
           if( $result3 ){
            
           session_start();

           $_SESSION['username'] = $_POST["username"] ;
          
          
            if($result1){
             $_SESSION['sellerID'] = $_POST["sellerID"] ;
              header("location: dashbordSeller.php");
 
                        }else {
                              header("location: index.php");
                        }
        
                   }
     

             else{

                  $error  = TRUE ;

          
                }
          }
 
   

?>   
 <?php    require_once('elements/header.php')           ?> 
 <br><br><br><br>
       <div class="centerReg">      
 <?php  if($error):  ?>
      
 <div class="alert alert-danger"> Invalid </div>
    
<?php  endif ?>
<form action="" class="mb-4 " method="POST">
      <center>
           <h1> Login </h1>
           <hr>
           <label for="username">  username </label>  
                  <input  style="width:45%" type="text" class="form-control" name="username" placeholder=" username">
                  <label>  SellerID </label><br>
                  <input style="width:45%" type="text" class="form-control" name="sellerID" placeholder="only for seller ">
                  <label for="password">  Password </label> 
                  <input  style="width:45%" id ="password" type="password" class="form-control" name="passwort" placeholder=" Password ">   
                  <br> <button>submit</button>
                  <a href="changepassword.php">password forgotten?</a> 
                 
                 </form>
                 </div> 


<?php    require('elements/footer.php')        ?>


      

