<?php
	session_start();
	if(!isset($_SESSION['admin']))
	{
		header('location:index.php');
	}
?>
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="dashboard.php">Admin Panel</a> 
	</div>
	<div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> 
		Welcome <?=$_SESSION['admin']['admin_name']?>&nbsp;&nbsp;
		<a href="logout.php" class="btn btn-danger square-btn-adjust">
			Logout
		</a> 
	</div>
</nav>