<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Save Link</title>
</head>
<link type="text/css" rel="stylesheet" href="sty1.css" />
<body>
<form action='savelink.php' method='post' autocomplete="off">
<div class="post1"> 
<center><h1>New Website Register Form</h1></center>
<label><b><h3>Enter Your Webside Link:</h3></b></label>
<input type="text" placeholder="Webside Name " name="link" id="searcharea" required><br>
<br>
<br>
<label><b><h3>Enter Your Webside Title:</h3></b></label>
<input type="text" placeholder="Webside Title " name="wtitle" id="searcharea1" required><br>
<br>
<br>
<label><b><h3>Enter Your Webside Description:</h3></b></label>
<input type="text" placeholder="Webside Description " name="wdes" id="searcharea2"required><br>
<br>
<br>
<label><b><h3>Enter Your Webside Keywords:</h3></b></label>
<input type="text" placeholder="Webside Keywords " name="wkey" id="searcharea3" required><br>
<br>
<br>
<br>
<br>
<br>
<button type="submit" class="save">Save</button><a href="profile.php"><button type="button" class="cancelbtn">Cancel</button></a>
 </div>
 </body>
</html>