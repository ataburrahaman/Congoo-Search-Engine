<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Error</h1>
    <p>
    <?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];
    else:
	
        header( "location: http://localhost/tast%20sEARCH%20ENGINE/login-system/error.php");
    endif;
    ?>
    </p>     
    <a href= "http://localhost/tast%20sEARCH%20ENGINE/index.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
