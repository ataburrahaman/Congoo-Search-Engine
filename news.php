<html>
   <head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<title>Congoo-News</title>
   </head>
 <body>	
 <form action = './news.php ' method='get'>
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
					require_once 'newsbar.php';
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
			$time_start = microtime(true);
			$terms=explode(" ", $k);
			$query="SELECT * FROM search WHERE ";
			
			    
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
			$time_end = microtime(true);
			$total_time = $time_end - $time_start;
			echo "About  $numrows     results  ($total_time Sec) \n\n";
			
			//mysqli_select_db("tutorials");
			if($numrows > 0){
				
				while ( $row = mysqli_fetch_assoc($query)){
					
					$id = $row['id'];
					$title = $row['title'];
					$description = $row['description'];
					$keyword = $row['keyword'];
					$link = $row['link'];
					
					echo "<h2> <a href='$link'>$title</a></h2>";
					echo "<br />$description<br /><br />";
					
				}
				
			}
			else
				echo "<br /><h4> Your search- \"<b> <b>$k</b></b>\" -did not match any documents.</h4>";
			    
			
			// disconnect
			mysqli_close($con);
			}
		?>
  </body>
 </html>