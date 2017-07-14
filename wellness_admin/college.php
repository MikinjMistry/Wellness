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
	$colleges = $obj->query("select c.*,co.name as course_name, s.name as state_name from college c left join course_state cs on c.course_state_id = cs.id left join course co on cs.course_id = co.id left join state s on cs.state_id = s.id");

	$course = $obj->select('course');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Colleges</title>
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
						Colleges
						<div class="pull-right">
							<a href="college_add.php" class="btn btn-icon btn-primary">
								<i class="fa fa-plus"></i>
								&nbsp;Add
							</a>
						</div>
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Colleges
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
								<?php
									if(count($colleges) <= 0)
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
													<th>College</th>
													<th>University</th>
													<th>Establishment Year</th>
													<th>Available Seat</th>
													<th>Website</th>
													<th>Couse Name</th>
													<th>State</th>
													<th style="width:10%;">Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach($colleges as $key=>$record)
													{
														?>
														<tr class="record">
															<td class="college_name"><?php echo $record['name'] ?></td>
															<td><?php echo $record['university']; ?></td>
															<td><?php echo $record['establishment_year']; ?></td>
															<td><?php echo $record['available_seat']; ?></td>
															<td><?php echo $record['website']; ?></td>
															<td><?php echo $record['course_name']; ?></td>
															<td><?php echo $record['state_name']; ?></td>
															<td class="center">
																<a href="college_edit.php?id=<?php echo $record['id'] ?>" class="edit_course" data-id="<?php echo $record['id'] ?>">
																	<i class="fa fa-edit"></i>
																</a> &nbsp;
																<a href="javascript:void(0);" class="delete_course" data-id="<?php echo $record['id'] ?>">
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
			$('#dataTables-example').dataTable({
				columnDefs: [ { orderable: false, searchable: false, targets: [7] }]
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
								url : 'college_delete.php',
								method: 'post',
								data : 'cat_id='+cat_id,
								success : function(str)
								{	
									if(str == true)
									{
										swal("Deleted!", "College has been deleted.", "success");
										window.location = "college.php";
									}
									else
									{
										swal("Cancelled", "Something went wrong.", "error");
									}
								}
							});
						} else {
							swal("Cancelled", "college was not deleted :)", "error");
						}
					});
			});
		});
    </script>
</body>
</html>