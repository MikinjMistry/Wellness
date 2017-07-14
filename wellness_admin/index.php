<?php
	require_once '../api/wellness.php';
	session_start();
	$ob = new wellness();
	if(isset($_POST['login']))
	{
		$uname = $_POST['email'];
		$passwd = $_POST['password'];
		$str = "select * from admin_login where username ='".$uname."' and password = '".$passwd."'";
		$row = $ob->query($str);
		if(count($row) == 1)
		{
			$_SESSION['admin'] = $row[0];
			header('location:dashboard.php');
		}
		else
		{
			$err = 'Username or password is wrong.';
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Wellness</title>
	<!-- Custom Theme files -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<!-- for-mobile-apps -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- //for-mobile-apps -->
	<!--Google Fonts-->
	<link href='//fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>
	<!--google fonts-->
</head>
<body>
<!--header start here-->
<h1>Wellness</h1>
<div class="header agile">
	<div class="wrap">
		<div class="login-main wthree">
			<div class="login">
				<h3>Login</h3>
				<form action="" method="post">
					<label style="color:red"><?=(isset($err) ? $err : '')?></label>
					<input type="text" placeholder="username" required="" name="email">
					<input type="password" placeholder="Password" name="password">
					<input type="submit" value="Login" name="login">
				</form>
				<div class="clear"> </div>		
			</div>
			
		</div>
	</div>
</div>
<!--header end here-->
</body>
</html>
