<?php
session_start();
?>
<html>
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styani.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Congoo-Image</title>
   </head>
 <body>
  <?php
  @$eml=$_SESSION['email'];
        @$fast_name=$_SESSION['first_name'];
		@$last_name=$_SESSION['last_name'];
 if ( isset($_SESSION['logged_in']) != 1 ) {
  require_once 'singupac.php';   
}
else{	
	require_once 'loginac.php';
}
					
		?>
			<form action = './image.php ' method='get'>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="sty.css">
		<div style="padding-left:0px" id="allmenu">
			<br> 
		 <div id="poimg"><a href="index.php"><img src="congoo4.png" height='50px' width='130px' "padding-top:200px"></a></div>
		<div class="bk">
              	<input type="text"  class="textbox" placeholder="What are you looking for ?" value='<?php if(isset($_GET['k'])){ ECHO $_GET['k']; } ?>' name ='k'>
				<button type="submit" class="query-submit"><i class="fa fa-search" aria-hidden="true" style="color:#fffff; font-size:30px"></i></button>
   	  		  </div>
		<br>
		</br>
		</div>
			<?php
					require_once 'imagebar.php';
			?>
		</div>
		<?php
		
			$i=0;
			$m= $_GET['k'];
			$a= trim($m);
			$k= strtolower($a);
			if(isset($_GET['k'])){ $tem=$_GET['k']; }
			
			if(empty($k)){
				header("location:http://localhost/extra%20scarch%20engine/index.php"); 
				
			}
			
			else{

			$terms=explode(" ", $k);
			$query="SELECT * FROM image WHERE";
			
			    
			foreach ($terms as $each){ 
				$i++;
				if($i == 1)
					$query .=" keyword LIKE '%$each%' ";
				else
					$query .="OR keyword LIKE '%$each%' ";	
			}
			// connect
		$con =  mysqli_connect("localhost", "atabur","rahaman","tutorials");
			$query = mysqli_query($con , $query);
			$numrows = mysqli_num_rows($query);
			
			//mysqli_select_db("tutorials");
			if($numrows > 0){
				
				while ($row = mysqli_fetch_assoc($query)){
					
					$id = $row['id'];
					$title = $row['title'];
					$keyword = $row['keyword'];
					$imge = $row['imge']; 
						echo '<img src = "data:image/jpeg;base64,' .base64_encode($row['imge']).'" height="28%" width="22%" border="10px solid "/>';
				}
				
				
			}
			else
				echo "<br /><h4> Your search- \"<b> <b>$k</b></b>\" -did not match any Images.</h4>";
			    
			
			// disconnect
			mysqli_close($con);
			}
		?>
  </body>
 </html>