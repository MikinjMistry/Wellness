<?php
	require_once '../api/wellness.php';
	$ob = new wellness();
	$str = 'select i.*, c.name as cname, s.name as sname from inquiry i left join course c on c.id = i.course_id left join state s on s.id = i.state_id';
	$subscribe = $ob->query($str);
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
						Inquiry
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Inquiry List
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
                                            <th>student name</th>
                                            <th>Phone</th>
											<th>Course</th>
											<th>State</th>
											<th>Is Read</th>
											<th>Date</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											foreach($subscribe as $val)
											{
										?>
                                        <tr class="">
                                            <td><?=$val['student_name']?></td>
                                            <td><?=$val['mobile_no']?></td>
                                            <td><?=$val['cname']?></td>
                                            <td><?=$val['sname']?></td>
                                            <td><input type="checkbox" id="<?=$val['id']?>"  data-off-text="No" data-on-text="Yes" class="status" <?=$val['is_read'] == '1' ? 'checked' : '' ?> /></td>
                                            <td><?= date('d, M Y', strtotime($val['date_time']))?></td>
											<td><a href="javascript:;" class="view"  id="<?=$val['id']?>" title="View Detail"><i class="fa fa-eye"></i></a></td>
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
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Detail</h4>
		  </div>
		  <div class="modal-body">
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	<!-- End Model -->
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
					url : 'partial/inquiry_proc.php',
					method : 'post',
					data : {'id':id, 'status':flag},
					success : function(res)
					{
						
					}
				});
			});
			// Manage view
			$(document).on('click', '.view', function()
			{
				var id = $(this).attr('id');
				$.ajax({
					url : 'partial/inquiry_view_proc.php',
					method : 'post',
					data : {'id':id},
					success : function(res)
					{
						$('#myModal .modal-body').html(res);
						$('#myModal').modal();
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
				columnDefs : [{orderable : false, searchable:false,targets:[4,5,6]}]
			});
		});
    </script>
</body>
</html>