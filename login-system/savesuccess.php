<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="sty1.css">
<body>
<?php 
$t1=$_SESSION['link'] ;
$t2=$_SESSION['wtitle'] ;
$t3=$_SESSION['wdes'];
$t4=$_SESSION['wkey'];
$t5=$_SESSION['hash'];
?>
<div class="post1"> 
<div class="savesucc">
		Success full For Entering Your Website Name</div><br><br>
<b>Your Website Title Name ::</b><h1><?php echo "$t2";?></h1><br>
<b>Your Website link Name::</b><h1><?php echo "$t1";?></h1><br>
<b>Your Website Description Name::</b><h1><?php echo "$t3";?></h1>
<div class="inl">
<a href="profile.php"><button class="acc">My Account</button></a>
<a href="save.php"><button class="new">Enter A new Link</button></a>
</div></div></body>
</html>