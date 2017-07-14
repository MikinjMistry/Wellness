<?php
	function check_active($str)
	{
		$curr = basename($_SERVER['PHP_SELF'], '.php');
		if(in_array($curr, $str))
			return 'active-menu';
		return '';
	}
?>
<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">
			<li class="text-center">
				<img src="assets/img/find_user.png" class="user-image img-responsive"/>
			</li>
			<li>
				<a class="<?= check_active(['dashboard']) ?>"  href="dashboard.php"><i class="fa fa-dashboard "></i> Dashboard</a>
			</li>
			 <li>
				<a class="<?= check_active(['category']) ?>"  href="category.php"><i class="fa fa-desktop "></i> Category</a>
			</li>
			<li>
				<a  class="<?= check_active(['course']) ?>" href="course.php"><i class="fa fa-qrcode "></i> Course</a>
			</li>
				   <li  >
				<a class="<?= check_active(['state']) ?>"  href="state.php"><i class="fa fa-bar-chart-o "></i> State</a>
			</li>	
			  <li  >
				<a class="<?= check_active(['college', 'college_add', 'college_edit']) ?>" href="college.php"><i class="fa fa-table "></i> College</a>
			</li>
			<li  >
				<a  class="<?= check_active(['inquiry']) ?>" href="inquiry.php"><i class="fa fa-edit "></i> Inquiry</a>
			</li>
			<li>
				<a  class="<?= check_active(['gallery', 'gallery_add']) ?>" href="gallery.php"><i class="fa fa-edit "></i> Gallary</a>
			</li>
			<li>
				<a class="<?= check_active(['banners', 'banner_add']) ?>" href="banners.php"><i class="fa fa-edit"></i> Banner</a>
			</li>
			<li>
				<a class="<?= check_active(['news', 'news_add', 'news_edit']) ?>" href="news.php"><i class="fa fa-file-text"></i> News</a>
			</li>
			<li>
				<a class="<?= check_active(['subscriber']) ?>" href="subscriber.php"><i class="fa fa-user "></i> Subscriber</a>
			</li>
		</ul>
	</div>
</nav>