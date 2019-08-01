<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<?php
// Set session variables to be used on save.php page
$_SESSION['link'] = $_POST['link'];
$_SESSION['wtitle'] = $_POST['wtitle'];
$_SESSION['wdes'] = $_POST['wdes'];
$_SESSION['wkey'] = $_POST['wkey'];
/*echo "$_POST['wtitle']";*/
/* Escape all $_POST variables to protect against SQL injections*/
$title = $mysqli->escape_string($_POST['wtitle']);
$description = $mysqli->escape_string($_POST['wdes']);
$keyword = $mysqli->escape_string($_POST['wkey']);
$link = $mysqli->escape_string($_POST['link']);
$acdet = $mysqli->escape_string($_SESSION['hash']);

// Check if user with that link already exists
$result = $mysqli->query("SELECT * FROM search WHERE link='$link'") or die($mysqli->error());

// We know user link exists if the rows returned are more than 0

if ( $result->num_rows > 0 ){
    
    $_SESSION['message'] = 'User with this link already exists!';
    header("location: error.php");
    
}
else { 
	// Link doesn't already exist in a database, proceed...

    $sql = "INSERT INTO search (title,description,keyword,link,acdet ) " 
            . "VALUES ('$title','$description','$keyword','$link','$acdet')";
}
 if ( $mysqli->query($sql) ){
        header("location: savesuccess.php"); 
    }
 /*else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }*/
?>