<?

session_start();

require('elements/header.php');
session_unset();
session_destroy();

header("location:index.php");



exit();


require('elements/footer.php')

?>