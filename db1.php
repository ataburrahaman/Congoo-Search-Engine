<?php
/* Database connection settings */
$host = 'localhost';
$user = 'atabur';
$pass = 'rahaman';
$db = 'tutorials';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
