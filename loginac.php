
 <?php
  @$eml=$_SESSION['email'];
        @$fast_name=$_SESSION['first_name'];
		@$last_name=$_SESSION['last_name'];
		?>
<nav>
  <ul>
    <li id="login">
      <a id="login-trigger" href="#"><span class="glyphicon glyphicon-user"></span>
        <?php echo "$fast_name" ;?> 
      </a>
      <div id="login-content">
        <form>
          <fieldset id="inputs">
		  <p><div id="userpo"> <img src="atabur1.png" alt="Avatar" style="width:50px"alt="Headshot photo" class="left"/><div id="uspo"><?php echo $fast_name ; echo $last_name;?> <?php echo "<br>$eml"; ?> </div> </div>
		<hr>
		  <a href="login-system/profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a><hr>
		   <a href="http://localhost/tast%20sEARCH%20ENGINE/index.php"><span class="glyphicon glyphicon-home"></span> Home</a><hr>
		    <a href="http://localhost/tast%20sEARCH%20ENGINE/hist.php"><span class="glyphicon glyphicon-record"></span> History </a><hr>
		   <a href="http://localhost/tast%20sEARCH%20ENGINE/login-system/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a>
        </form>
      </div>
  </ul>
</nav>

<script>
$(document).ready(function(){
  $('#login-trigger').click(function(){
    $(this).next('#login-content').slideToggle();
    $(this).toggleClass('active');          
    
    if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
      else $(this).find('span').html('&#x25BC;')
    })
});
</script>