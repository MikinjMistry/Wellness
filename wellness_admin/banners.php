<?php
	require_once '../api/wellness.php';
	$ob = new wellness();
	$banner = $ob->select('banner');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap-switch.min.css" rel="stylesheet" />
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
			<div class="row">
				<div class="col-md-12">
					<h2>
						Banners
						<div class="pull-right">
							<a href="./banner_add.php" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</a>
						 </div>
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Banners
							 
                        </div>
                        <div class="panel-body">
						<?php
							if(count($banner) == 0)
							{
								echo '<div class="alert alert-success">No data available.</div>';
							}
							else
							{
						?>
						<?php
								foreach($banner as $val)
								{
						?>
									<div class="panel panel-success">
										<div class="panel-heading">
											Status : <input type="checkbox" id="<?=$val['id']?>" class="status" <?= $val['is_active'] == '1'? 'checked' : ''?>/>
										</div>
										
										<div class="panel-body">
											<img src="../uploads/slider/<?=$val['image_path']?>" class="banner_image"/>
										</div>
									</div>
						<?php
								}
							}
						?>
                        </div>   
                    </div>
                    <!--End Advanced Tables -->
                </div>
			</div>
		</div>
	</div>
	
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
	
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap-switch.js"></script>
	<script>
		$('.status').bootstrapSwitch();
		$(function()
		{
			$(document).on('switchChange.bootstrapSwitch', '.status', function(event, status)
			{
				var id = $(this).attr('id');
				var flag = $(this).prop('checked');
					
				$.ajax({
					url : 'partial/banner_proc.php',
					method : 'post',
					data : {'id':id, 'status':flag},
					success : function(res)
					{
						
					}
				});
			});
		});
	</script>
    <!-- CUSTOM SCRIPTS -->
</body>
</html>