<?php
	require_once '../api/wellness.php';
	$obj = new wellness();
	if(isset($_POST['submit']))
	{
		$data = array();
		$data['name'] = $_POST['course'];
		$course_id = $obj->insert('course',$data);
		foreach($_POST['states'] as $state)
		{
			$cs = array();
			$cs['course_id'] = $course_id;
			$cs['state_id'] = $state;
			$status = $obj->insert('course_state',$cs);
		}
	}
	$course = $obj->query("SELECT c.id,c.name,s.id as state_id, s.name as state_name from course c left join course_state cs on c.id = cs.course_id left join state s on cs.state_id = s.id");
	$course_data = array();
	foreach($course as $record)
	{
		if (array_key_exists($record['id'],$course_data))
		{
			if($record['state_id'] != null)
			{				
				$course_data[$record['id']]['states'][] = array('id'=>$record['state_id'],'name'=>$record['state_name']);
			}
		}
		else
		{
			$course_data[$record['id']]['name'] = $record['name'];
			if($record['state_id'] != null)
			{
				$course_data[$record['id']]['states'][] = array('id'=>$record['state_id'],'name'=>$record['state_name']);
			}
		}
	}
//	print_r($course_data);die;
	$state_data = $obj->select("state");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | course</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<link href="assets/css/bootstrap-select.css" rel="stylesheet"/>
	<link href="assets/css/sweetalert.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
		<!-- /. NAV TOP  -->
		<?php require_once "./header.php"; ?>		   
		<!-- /. NAV SIDE  -->
		<?php require_once "./right_menu.php"; ?>
		
        <div id="page-wrapper">
			<div class="row">
				<div class="col-md-12">
					<h2>
						Courses
						<div class="pull-right">
							<button class="btn btn-icon btn-primary" data-toggle="modal" data-target="#myModal">
								<i class="fa fa-plus"></i>
								&nbsp;Add
							</button>
						</div>
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Courses
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
								<?php
									if(count($course_data) <= 0)
									{
										?>
										<div class="alert alert-info text-center">
											No course available.
										</div>
										<?php
									}
									else
									{
										?>										
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th>Course name</th>
													<th>Available in</th>
													<th style="width:10%;">Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach($course_data as $key=>$record)
													{
														?>
														<tr class="record">
															<td class="course_name"><?php echo $record['name'] ?></td>
															<td>
																<?php
																	if(isset($record['states']) && count($record['states']) > 0)
																	{
																		?>
																		<ul>
																			<?php
																				foreach($record['states'] as $value)
																				{
																					?>
																					<li><?php echo $value['name']; ?></li>
																					<?php
																				}
																			?>
																		</ul>
																		<?php
																	}
																	else
																	{
																		echo "Not added.";
																	}
																?>
															</td>
															<td class="center">
																<a href="javascript:void(0);" class="edit_course" data-id="<?php echo $key ?>" data-toggle="modal" data-target="#editModal">
																	<i class="fa fa-edit"></i>
																</a> &nbsp;
																<a href="javascript:void(0);" class="delete_course" data-id="<?php echo $key ?>">
																	<i class="fa fa-times"></i>
																</a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
										<?php
									}
								?>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
			</div>
		</div>
	</div>
	
	<!-- course Add model -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Course Information</h4>
				</div>
				<form class="form-horizontal" method="post" role="form">
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-sm-12 col-md-3" for="course">Course Name:</label>
							<div class="col-sm-12 col-md-9">
								<input type="text" class="form-control" name="course" id="course" placeholder="Enter name of the course">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-12 col-md-3" for="course">Available at:</label>
							<div class="col-sm-12 col-md-9">
								<select class="selectpicker" name="states[]" multiple title="Select Area" data-live-search="true" data-selected-text-format="count > 3" data-width='100%' data-size="3" data-actions-box="true">
									<?php
										foreach($state_data as $state_record)
										{
											?>
											<option value="<?php echo $state_record['id']; ?>"><?php echo $state_record['name']; ?></option>
											<?php
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="submit">
							<i class="fa fa-save"></i>
							Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- course Add model over -->
	
	<!-- course Edit model -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Course Information</h4>
				</div>
				<form class="form-horizontal" method="post" role="form" action="course_update.php">
					<input type="hidden" id="course_id" name="course_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-sm-12 col-md-3" for="course">Course Name:</label>
							<div class="col-sm-12 col-md-9">
								<input type="text" class="form-control" name="update_course" id="update_course" placeholder="Enter name of the course">
							</div>
						</div>		
						<div class="form-group">							
							<label class="control-label col-sm-12 col-md-3" for="course">Available at:</label>
							<div class="col-sm-12 col-md-9">
								<select class="update_selectpicker" name="updated_states[]" multiple title="Select Area" data-live-search="true" data-selected-text-format="count > 3" data-width='100%' data-size="3" data-actions-box="true">
									<?php
										foreach($state_data as $state_record)
										{
											?>
											<option value="<?php echo $state_record['id']; ?>"><?php echo $state_record['name']; ?></option>
											<?php
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" name="submit">
							<i class="fa fa-save"></i>
							Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- course Add model over -->
	
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
	<!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/sweetalert.min.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/bootstrap-select.js"></script>
	
	<script>
		$(document).ready(function () {
			$('.selectpicker').selectpicker();
			$('#dataTables-example').dataTable({
				columnDefs: [ { orderable: false, searchable: false, targets: [2] }]
			});
			
			$(".edit_course").click(function(){
				var id = $(this).attr('data-id');
				$("#course_id").val(id);
				$.ajax({
					url:'partial/get_state_by_course_id.php',
					data:'course_id='+id,
					method:'post',
					success:function(str){
						data = JSON.parse(str);
						ids = new Array();
						for(var d in data)
						{
							$('.update_selectpicker option[value="'+data[d].id+'"]').attr('selected','selected');
						}
						$('.update_selectpicker').selectpicker('refresh');
					}
				});
				$("#update_course").val($(this).parents(".record").children('.course_name').html());
			});
			
			$(".delete_course").click(function(){
				cat_id = $(this).attr('data-id');
				swal({
						title: "Are you sure?",
						text: "You will not be able to recover this imaginary file!",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "Yes, delete it!",
						cancelButtonText: "No, cancel plx!",
						closeOnConfirm: false,
						closeOnCancel: false
					},
					function(isConfirm){
						if (isConfirm) {
							$.ajax({
								url : 'course_delete.php',
								method: 'post',
								data : 'cat_id='+cat_id,
								success : function(str)
								{	
									if(str == true)
									{
										swal("Deleted!", "course has been deleted.", "success");
										window.location = "course.php";
									}
									else
									{
										swal("Cancelled", "Something went wrong.", "error");
									}
								}
							});
						} else {
							swal("Cancelled", "course is not deleted :)", "error");
						}
					});
			});
		});
    </script>
</body>
</html>