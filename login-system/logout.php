<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>

<body>

    <div class="form">
          <h1>Thanks for stopping Congoo</h1>
		  <h1>Congoo</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
		  <?php
  ?>
          
          <a href="http://localhost/tast%20sEARCH%20ENGINE/index.php"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>
