<?php
/* Displays user information and some useful messages */
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
	
  header("location: http://localhost/tast%20sEARCH%20ENGINE/login-system/index.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <link type="text/css" rel="stylesheet" href="pro.css" />
</head>

<body>
  <div class="form">

          <h1>Welcome</h1>
          
          <p>
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          ?>
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
		  <br>
		  <br>
		  <br>
		  <div class="inl">
		   <a href="http://localhost/tast%20sEARCH%20ENGINE/index.php"><button class="home" name="k"/>HOME</button></a>
		   <a href="http://localhost/tast%20sEARCH%20ENGINE/login-system/logout.php"><button class="out" name="k"/>Log Out</button></a>
		   <a href="linkse.php"><button class="mng" name="k">Manage Website</button></a>
           </div>
		   <br> 
		   <br>
		   <a href="http://localhost/tast%20sEARCH%20ENGINE/login-system/save.php"><button class="new" name="k"/>Register New Website</button></a>
		    </div>

    
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>