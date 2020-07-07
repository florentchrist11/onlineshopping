
 
  <?php 

  $title = "Login";
   require('Modell/DAOuser.php');
   

    $error = null ;
    $check = '' ;
    $result1 = null ;
    $test = false ;
    $check1 = false ;
    $error = null ;
    $result2 = null ;
    $result3 = null ;
    $verifyPasswort= false;
    
   if(isset($_POST['username'], $_POST['passwort'], $_POST['sellerID'])){
         
    require_once('Modell/mysqliteconnection.php');
    require_once('Modell/CreateTableUser.php');
   
   
   $fields = 'username';
   $value = $_POST['username'];
   $table="account";
   $result2 = new DAOuser();
  
   
  
   $result = $result2 -> getStatus($table,$fields,$value);
   $result3 = $result2 -> getTaskCountByProject( $fields , $value) ;
   $pass = $result2 ->getPass($fields,$_POST['username'] );
   
   $fields = 'token';
   $value = $_POST['sellerID'];


  $result1 = $result2 ->getTaskCountByProject( $fields , $value) ;
      foreach ( $result as $row){ 
        if($row['token'] != null){ 
               $check = $row['sellerID'];
       }
      }
      if(password_verify($_POST["passwort"],$pass["pwd"])){ 
          $verifyPasswort=true;
      } 
       if( $result3 ){
          if($check=="active" || $check == Null ){
           session_start();

           $_SESSION['username'] = $_POST["username"] ;
            if( $verifyPasswort){ 
                
            if($result1){
                 
             $_SESSION['sellerID'] = $_POST["sellerID"] ;
             
              header("location: dashbordSeller.php");
                  
            }else {
              header("location: index.php");
            }
          }else{$error = true ; }
        }
       }else{$error = true ;}  
       if($check == "inactive"){  ?>

 <script>  alert("your Account has been Blocked. Please contact the Administrator ");</script> 
 
 <?php 
       }
   }
   ?> 
   
 <?php    require_once('elements/header.php')           ?> 
 <br><br><br><br>
       <div class="centerReg">      
 <?php  if($error || $verifyPasswort ):  ?>
      
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

                 <!DOCTYPE html>
<head>
<meta charset="UTF-8">
</head>
<body>
<center>
<script>
// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
console.log('statusChangeCallback');
console.log(response);
// The response object is returned with a status field that lets the
// app know the current login status of the person.
// Full docs on the response object can be found in the documentation
// for FB.getLoginStatus().
if (response.status === 'connected') {
// Logged into your app and Facebook.
testAPI();
} else if (response.status === 'not_authorized') {
// The person is logged into Facebook, but not your app.
document.getElementById('status').innerHTML = 'Login with Facebook ';
} else {
// The person is not logged into Facebook, so we're not sure if
// they are logged into this app or not.
document.getElementById('status').innerHTML = 'Login with Facebook ';
}
}
// This function is called when someone finishes with the Login
// Button. See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
FB.getLoginStatus(function(response) {
statusChangeCallback(response);
});
}
window.fbAsyncInit = function() {
FB.init({
appId : '1206334933080245',
cookie : true, // enable cookies to allow the server to access
// the session
xfbml : true, // parse social plugins on this page
version : 'v2.2' // use version 2.2
});
// Now that we've initialized the JavaScript SDK, we call
// FB.getLoginStatus(). This function gets the state of the
// person visiting this page and can return one of three states to
// the callback you provide. They can be:
//
// 1. Logged into your app ('connected')
// 2. Logged into Facebook, but not your app ('not_authorized')
// 3. Not logged into Facebook and can't tell if they are logged into
// your app or not.
//
// These three cases are handled in the callback function.

FB.getLoginStatus(function(response) {
statusChangeCallback(response);
});
};
// Load the SDK asynchronously
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Here we run a very simple test of the Graph API after login is
// successful. See statusChangeCallback() for when this call is made.
function testAPI() {
console.log('Welcome! Fetching your information.... ');
FB.api('/me?fields=name,email', function(response) {
console.log('Successful login for: ' + response.name);

document.getElementById("status").innerHTML = '<p>Welcome '+response.name+'! <a href=index.php?name='+ response.name.replace(" ", "_") +'&email='+ response.email +'>Continue with facebook login</a></p>'
});
}
</script>
<!--
Below we include the Login Button social plugin. This button uses
the JavaScript SDK to present a graphical Login button that triggers
the FB.login() function when clicked.
-->
<br><br>
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
<div id="status">
</div>
<script type="text/javascript">
</script>
</center>
</body>
</html>
<?php    require('elements/footer.php')        ?>


      

