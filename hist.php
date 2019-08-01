<?php
require 'db.php';
session_start();
?>
<html xmlns="http://www.w3.org//1999/xhtml">
   <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Congoo-History</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
   </head>
   <?php
   echo"<hr><hr><center><p><h1>History of Congoo Search</h1></p></center><br><hr><hr><hr>";
   @$hash=$_SESSION['hash'];
  @$result = $mysqli->query("SELECT * FROM history WHERE accid='$hash'");
   echo "<center><table>
    <tr>
        <th><h3>Search Word</h3></th><th><__________________></th>
        <th><h3>Date and Time</h3></th>
    </tr>";
    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        		echo "<br /><center><h1> Your did not any Searching Words.</h1></center><br>Please Use Congoo";
    }
    else { // User exists (num_rows != 0)
		
        while( $user = $result->fetch_assoc())
	{
	             $id = $user['id'];
					$keyword = $user['keyword'];
					$dat = $user['date'];
					echo "
        <tr>
            <td>$keyword    </td><th> </th>
            <td>       $dat<br></td>
        </tr>";	
				}
				echo "</table><center>";

		}
		?>
			
		</html>