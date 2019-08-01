<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Show Link</title>
</head>
<link type="text/css" rel="stylesheet" href="pro.css" />
<body>
<div class="post1"> 
    <h1>Details of Entering Links</h1>
<?php
$hash=$_SESSION['hash'];
// Check if user with that link already exists
$result = $mysqli->query("SELECT * FROM search WHERE acdet='$hash'");
    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "User with that links doesn't exist!";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        while( $user = $result->fetch_assoc())
	{
	$title = $user['title'];
        $hash = $user['acdet'];
        $link = $user['link'];
echo"<b>title: $title  <br>   link: $link</b> <a href='profile.php?p=$title.&l=.$link'><button type='button' class='back'>Edit</button></a> <a href='profile.php?p=$hash'><button type='button' class='back'>Delete</button></a><br><br><br><br>";		
	}

		}
?>
<br>
<br>
<br>
 <a href="http://localhost/tast%20sEARCH%20ENGINE/index.php"><button class="home" name="k"/>HOME</button></a>
 <a href="profile.php"><button type="button" class="back">Back</button></a>
   </div>
</body>

</html>