<?php
	require_once '../api/wellness.php';
	$obj = new wellness();
	if(isset($_POST['submit']))
	{
		$data = array();
		$data['name'] = $_POST['name'];
		$data['university'] = $_POST['university'];
		$data['establishment_year'] = $_POST['estb_year'];
		$data['available_seat'] = $_POST['seat'];
		$data['website'] = $_POST['website'];
		$data['course_state_id'] = $_POST['state'];
		$data['description'] = $_POST['description'];
		$obj->insert('college',$data);
		header('Location:college.php');
	}
	$course_data = $obj->select("course");
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
	<link href="assets/css/bootstrap-select.css" rel="stylesheet"/>
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
						Add new College
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Add College
                        </div>
                        <div class="panel-body">
							<!-- Form -->
							<form class="form-horizontal" method="post">
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="name" name="name" placeholder="Enter college name">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">University</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="university" name="university" placeholder="Enter university">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">Establishment Year</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="estb_year" name="estb_year" placeholder="Enter establishment year">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">Available seat</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" id="seat" name="seat" placeholder="Enter available seat for admission">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">Website</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="website" name="website" placeholder="Enter website of the college">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">Course</label>
									<div class="col-sm-10">
										<select class="selectpicker" id="course" name="course" title="Select Course" data-live-search="true" data-width='100%' data-size="3" required>
											<?php
												foreach($course_data as $course)
												{
													?>
													<option value="<?php echo $course['id']; ?>"><?php echo $course['name']; ?></option>
													<?php
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">State</label>
									<div class="col-sm-10">
										<select class="selectpicker" name="state" id="state" title="Select State" data-live-search="true" data-width='100%' data-size="3" required>
											
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">Content</label>
									<div class="col-sm-10">
										<textarea id="editor" name='description'></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<button type="submit" name="submit" class="btn btn-success">Add new</button>
										<a href="college.php" name="cancel" class="btn btn-default">Cancel</a>
									</div>
								</div>
								
							</form>
							<!-- End form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
	<script src="assets/js/bootstrap-select.js"></script>
    <!-- CUSTOM SCRIPTS -->
	<script type="text/javascript">
		$('document').ready(function(){
			$('selectpicker').selectpicker();
			$('#course').change(function(){
				var c = $(this).val();
				$.ajax({
					url : 'partial/getStateFromCourse.php',
					method : 'post',
					data : 'course_id='+c,
					success : function(str){
						$('#state').html(str);
						$('#state').selectpicker('refresh');
					}
				});
			});
			CKEDITOR.replace('editor', {
		        height: 400,
			   filebrowserBrowseUrl : '../kcfinder/browse.php?type=files',
			   filebrowserImageBrowseUrl : '../kcfinder/browse.php?type=images',
			   filebrowserFlashBrowseUrl : '../kcfinder/browse.php?type=flash',
			   filebrowserUploadUrl : '../kcfinder/upload.php?type=files',
			   filebrowserImageUploadUrl : '../kcfinder/upload.php?type=images',
			   filebrowserFlashUploadUrl : '../kcfinder/upload.php?type=flash'
		    });
		});
	</script>
</body>
</html>