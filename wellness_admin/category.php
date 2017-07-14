<?php
	require_once '../api/wellness.php';
	$obj = new wellness();
	if(isset($_POST['submit']))
	{
		$data = array();
		$data['name'] = $_POST['category'];
		$status = $obj->insert('category',$data);
	}
	$category_data = $obj->select("category");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Category</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
						Categories
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
                             Categories
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
								<?php
									if(count($category_data) <= 0)
									{
										?>
										<div class="alert alert-info text-center">
											No Category available.
										</div>
										<?php
									}
									else
									{
										?>										
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th>Category name</th>
													<th style="width:10%;">Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach($category_data as $record)
													{
														?>
														<tr class="record">
															<td class="category_name"><?php echo $record['name'] ?></td>
															<td class="center">
																<a href="javascript:void(0);" class="edit_category" data-id="<?php echo $record['id'] ?>" data-toggle="modal" data-target="#editModal">
																	<i class="fa fa-edit"></i>
																</a> &nbsp;
																<a href="javascript:void(0);" class="delete_category" data-id="<?php echo $record['id'] ?>">
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
	
	<!-- Category Add model -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Category Information</h4>
				</div>
				<form class="form-horizontal" method="post" role="form">
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-sm-12 col-md-3" for="category">Category Name:</label>
							<div class="col-sm-12 col-md-9">
								<input type="text" class="form-control" name="category" id="category" placeholder="Enter name of the category">
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
	<!-- Category Add model over -->
	
	<!-- Category Edit model -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Category Information</h4>
				</div>
				<form class="form-horizontal" method="post" role="form" action="category_update.php">
					<input type="hidden" id="category_id" name="category_id" value="">
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-sm-12 col-md-3" for="category">Category Name:</label>
							<div class="col-sm-12 col-md-9">
								<input type="text" class="form-control" name="update_category" id="update_category" placeholder="Enter name of the category">
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
	<!-- Category Add model over -->
	
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
	<script>
		$(document).ready(function () {
			$('#dataTables-example').dataTable({
				columnDefs: [ { orderable: false, searchable: false, targets: [1] }]
			});
			
			$(".edit_category").click(function(){
				$("#category_id").val($(this).attr('data-id'));
				$("#update_category").val($(this).parents(".record").children('.category_name').html());
			});
			
			$(".delete_category").click(function(){
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
								url : 'category_delete.php',
								method: 'post',
								data : 'cat_id='+cat_id,
								success : function(str)
								{	
									if(str == true)
									{
										swal("Deleted!", "Category has been deleted.", "success");
										window.location = "category.php";
									}
									else
									{
										swal("Cancelled", "Something went wrong.", "error");
									}
								}
							});
						} else {
							swal("Cancelled", "Category is not deleted :)", "error");
						}
					});
			});
		});
    </script>
</body>
</html>