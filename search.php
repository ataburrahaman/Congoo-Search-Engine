<?php
session_start();
?>
<html xmlns="http://www.w3.org//1999/xhtml">
<html>
   <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styani.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Congoo-Web</title>
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
    <link rel="stylesheet" type="text/css" href="sty.css">
	<link href="pagination.css" rel="stylesheet" type="text/css" />
<link href="A_green.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<form action = './search.php' method='get'>
	<div style="padding-left:0px" id="allmenu">
	<br> 
		 <div id="poimg"><a href="index.php"><img src="congoo4.png" height='50px' width='130px' "padding-top:200px"></a></div>
		<div class="bk">
              	<input type="text"  class="textbox" placeholder="What are you looking for ?" value='<?php $xs=$_GET['k']; $ls=trim($xs); if(isset($ls)){ ECHO $ls; } ?>' name ='k'>
				<button type="submit" class="query-submit"><i class="fa fa-search" aria-hidden="true" style="color:#fffff; font-size:30px"></i></button>
   	  		  </div></input>
		<br>
		</br>
		</div>
		<?php
					require_once 'searchbar.php';
		?>
			
		<div style="padding-left:134px" class="top11">

    <div id="post10">

		<?php
			@$hash=$_SESSION['hash'];
			$con =  mysqli_connect("localhost", "atabur","rahaman","tutorials");
			$i=0;
			$m= $_GET['k'];
			if ( isset($_SESSION['hash']) ) {
						$sqldt="INSERT INTO history (keyword,accid) VALUES ('$m','$hash')";
			if (mysqli_query($con, $sqldt)) {
					echo " ";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
					}
				}
			$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
			$limit = 2; //if you want to dispaly 10 records per page then you have to change here
			$startpoint = ($page * $limit) - $limit;

			$a= trim($m);
			$k= strtolower($a);
			if(isset($_GET['k'])){ $tem=$_GET['k']; }
			
			if(empty($k)){
				header("location:http://localhost/tast%20sEARCH%20ENGINE/index.php"); 
			}
			
			else{
			$time_start = microtime(true);
			
			$terms=explode(" ", $k);
			$statement=" search WHERE ";
			
			    
			foreach ($terms as $each){ 
				$i++;
				if($i == 1)
					$statement .=" keyword LIKE '%$each%' ";
				else
					$statement .="OR keyword LIKE '%$each%' ";	
			}
			$qry="select * from {$statement}";
			// $statement .="LIMIT $x,$xx";
			//enable for seraching using query limit
			// connect
			$query = mysqli_query($con , $qry);
			$numrows = mysqli_num_rows($query);
			$time_end = microtime(true);
			$total_time = $time_end - $time_start;
			echo "About  $numrows     results  ($total_time Sec) \n\n";
			
			//mysqli_select_db("tutorials");
	
			if($numrows > 0){
				$res=mysqli_query($con , "select * from {$statement} LIMIT {$startpoint} , {$limit}");
				while($row=mysqli_fetch_array($res))
				{
					$id = $row['id'];
					$title = $row['title'];
					$description = $row['description'];
					$keyword = $row['keyword'];
					$link = $row['link'];
					echo "</br><div class='boxp'>
					<div class='tit'><a href='$link'>$title</a></div>
					<div class='info'>$link</div>
					<div class='des'>$description</div></div>";
				}
			echo "<div id='pagingg' >";
			$url="./search.php?k=$k&";
				echo pagination($statement,$limit,$page,$url,$con);
				echo "</div>";
			}
			else
				echo "<br /><h4> Your search-  \"<b> <b>$k</b></b>\"  -did not match any documents.</h4>";
			    
			
			// disconnect
			//mysqli_close($con);
			}
		?>
		</div>
		</div>
  </body>
 </html>
 
 <?php
    function pagination($query, $per_page = 10,$page = 1, $url = '?k=&',$con){        
    	$query = "SELECT COUNT(*) as `num` FROM {$query}";
    	$row = mysqli_fetch_array(mysqli_query($con , $query));
    	$total = $row['num'];
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	
    	$pagination = "";
    	if($lastpage > 1)
    	{	
    		$pagination .= "<ul class='pagination'>";
                    $pagination .= "<li class='details' style='margin-top:2px'>Page $page of $lastpage</li>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
    					$pagination.= "<li><a class='current'>$counter</a></li>";
    				else
    					$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    				$pagination.= "<li class='dot'>...</li>";
    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
    				$pagination.= "<li class='dot'>...</li>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    				$pagination.= "<li class='dot'>..</li>";
    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
    			}
    			else
    			{
    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
    				$pagination.= "<li class='dot'>..</li>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
    		}else{
    			$pagination.= "<li><a class='current'>next</a></li>";
                $pagination.= "<li><a class='current'>last</a></li>";
            }
    		$pagination.= "</ul>\n";		
    	}
    
    
        return $pagination;
    }
	?>