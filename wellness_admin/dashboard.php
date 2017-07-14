<?php
	require_once '../api/wellness.php';
	$obj = new wellness();
	$inquiry_cnt = $obj->query('select count(id) as cnt from inquiry');
	$subscriber_cnt = $obj->query('select count(id) as cnt from subscriber');
	$course_cnt = $obj->query('select count(id) as cnt from course');
	$college_cnt = $obj->query('select count(id) as cnt from college');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
		<!-- /. NAV TOP  -->
		<?php require_once "./header.php"; ?>		   
		<!-- /. NAV SIDE  -->
		<?php require_once "./right_menu.php"; ?>
		
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr />
                <div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-red set-icon">
								<i class="fa fa-envelope-o"></i>
							</span>
							<div class="text-box" >
								<p class="main-text"><?= $inquiry_cnt[0]['cnt'] ?></p>
								<p class="text-muted">Inquiry</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-green set-icon">
								<i class="fa fa-users"></i>
							</span>
							<div class="text-box" >
								<p class="main-text"><?= $subscriber_cnt[0]['cnt'] ?></p>
								<p class="text-muted">Subscribers</p>
							</div>
						</div>
					</div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-blue set-icon">
								<i class="fa fa-bell-o"></i>
							</span>
							<div class="text-box" >
								<p class="main-text"><?= $course_cnt[0]['cnt'] ?></p>
								<p class="text-muted">Courses</p>
							</div>
						</div>
					</div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
						<div class="panel panel-back noti-box">
							<span class="icon-box bg-color-brown set-icon">
								<i class="fa fa-rocket"></i>
							</span>
							<div class="text-box" >
								<p class="main-text"><?= $college_cnt[0]['cnt'] ?></p>
								<p class="text-muted">Colleges</p>
							</div>
						</div>
					</div>
				</div>
                 <!-- /. ROW  -->
                <hr />                
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
	</div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
</body>
</html>