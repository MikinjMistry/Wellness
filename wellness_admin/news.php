<?php
	require_once '../api/wellness.php';
	$ob = new wellness();
	$subscribe = $ob->select('news');
	if(isset($_GET['id']))
	{
		$ob->delete('news', $_GET['id']);
		header('location:news.php');
	}
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
						News
						<div class="pull-right">
							<a href="news_add.php" class="btn btn-primary"><i class="fa fa-plus">&nbsp;ADD</i></a>
						</div>
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             News
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
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Date</th>
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											foreach($subscribe as $val)
											{
										?>
                                        <tr class="">
                                            <td><?=$val['title']?></td>
                                            <td><?=$val['description']?></td>
                                            <td><input type="checkbox" id="<?=$val['id']?>" readonly class="status" <?=$val['is_active'] == '1' ? 'checked' : '' ?> /></td>
                                            <td><?= date('d, M Y', strtotime($val['date']))?></td>
											<td>
												<a href="news_edit.php?id=<?=$val['id']?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
												<a href="news.php?id=<?=$val['id']?>" onclick="return confirm('want to delete?')"><i class="fa fa-times"></i></a>&nbsp;&nbsp;
											</td>
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
			$('#dataTables-example').dataTable({
				columnDefs : [{orderable : false, searchable:false,targets:[2,3,4]}]
			});
		});
    </script>
</body>
</html>