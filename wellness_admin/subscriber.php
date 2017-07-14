<?php
	require_once '../api/wellness.php';
	$ob = new wellness();
	$subscribe = $ob->select('subscriber');
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
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
						Visitors
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Visitors
                        </div>
                        <div class="panel-body">
							<?php
								if(count($subscribe) == 0 )
								{
									echo '<div class="alert alert-success">No data available.</div>';
								}
								else
								{
							?>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone number</th>
                                            <th>Email</th>
                                            <th>Attend</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											foreach($subscribe as $val)
											{
										?>
                                        <tr class="">
                                            <td><?=$val['name']?></td>
                                            <td><?=$val['phone']?></td>
                                            <td><?=$val['email']?></td>
                                            <td><input type="checkbox" id="<?=$val['id']?>" data-off-text="No" data-on-text="Yes" class="status" <?=$val['is_attend'] == '1' ? 'checked' : '' ?> /></td>
                                        </tr>
										<?php
											}
										?>
                                    </tbody>
                                </table>
                            </div>
							<?php
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
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/bootstrap-switch.js"></script>
	<script>
		$(function()
		{
			$('.status').bootstrapSwitch();
			$(document).on('switchChange.bootstrapSwitch', '.status', function(event, status)
			{
				var id = $(this).attr('id');
				var flag = $(this).prop('checked');
					
				$.ajax({
					url : 'partial/subscriber_proc.php',
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
	<!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function () {
			$('#dataTables-example').dataTable();
		});
    </script>
</body>
</html>