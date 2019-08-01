<?php
session_start();
?>
<html xmlns="http://www.w3.org//1999/xhtml">
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styani.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Congoo-images-Home</title>
	<link rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
   </head>
  
    </head>
 <body>
  <?php
        @$eml=$_SESSION['email'];
        @$fast_name=$_SESSION['first_name'];
		@$last_name=$_SESSION['last_name'];
        @$active=$_SESSION['active'];
 if ( isset($_SESSION['logged_in']) != 1 ) {
  require_once 'singupac.php';   
}
else{	
	require_once 'loginac.php';
}
					
		?>
 <br>
 <br>
 <br>
 <br>
		<form action = './indexing.php' method='get'>
		<a href="index.php?temp=<?php if(isset($_GET['temp'])){ ECHO $_GET['temp']; $temp = $_GET['temp']; }?>"><div class="tag">
			Web</div></a>
		
		<center>
		
		<div class="srbox">
		<img src="congoo.png" height='250' width='750'/><div class="wordin">
		Images</div>
			  <div class="bk">
              	<input type="text"  class="textbox" placeholder="What are you looking for ?" value='<?php if(isset($_GET['k'])){ ECHO $_GET['k']; } ?>' name ='k'>
				<button type="submit" class="query-submit"><i class="fa fa-search" style="color:#010202; font-size:30px"></i></button>
   	  		  </div>
		</form>
		</center>
		<?php
		if(isset($_GET['k'])){ 
		$k=$_GET['k'];
		}
		 if(isset($_GET['temp'])){$temp = $_GET['temp'];}
		
			if(empty($k)){
				//header("location:http://localhost/tast%20sEARCH%20ENGINE/index.php" ); 
				
			}
			else{
				header("location:http://localhost/tast%20sEARCH%20ENGINE/image.php?k=".$k);
			}
			?>
			</body>
 </html>
	
	