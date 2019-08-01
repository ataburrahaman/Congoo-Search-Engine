<?php
session_start();
?>
<html xmlns="http://www.w3.org//1999/xhtml">
   <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Congoo-Home</title>
	<link rel="stylesheet" href="style.css" type="text/css">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styani.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
   </head>
   <?php
		if(isset($_GET['k'])){ 
		$k=$_GET['k'];
		}
		//if(isset($_GET['temp'])){
		//$temp=$_GET['temp'] ;
		//$_SESSION['temp']=$temp;//$_GET['temp'];
		//echo $temp;
		//}
		
        @$eml=$_SESSION['email'];
        @$fast_name=$_SESSION['first_name'];
		@$last_name=$_SESSION['last_name'];
        @$active=$_SESSION['active'];
		@$hash=$_SESSION['hash'];
		?>
  
    </head>
 <body>
 <?php
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
		<form action = './index.php' method='get'><div class="mng">
		<a href="indexing.php">
			Images</a></div>
		
		<center>
		
		<div class="srbox">
		<img src="congoo.png" height='250' width='750'/><div class="wordin">
		India</div>
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
		
			if(!empty($k)){
				header("location:http://localhost/tast%20sEARCH%20ENGINE/search.php?k=".$k);
			}
			
			?>
		<div align=center><img src='https://www.counter12.com/img-CD57Dz681wZ5zccC-91.gif' border='0' alt='counter'></a><script type='text/javascript' src='https://www.counter12.com/ad.js?id=CD57Dz681wZ5zccC'></script></div>
  </body>
 </html>
	
	