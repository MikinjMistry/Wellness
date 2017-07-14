<?php
	require_once '../api/wellness.php';
	$ob = new wellness();
	$err = [];
	
	if(isset($_GET['id']))
	{
		$str = 'select * from news where id = '.$_GET['id'];
		$row = $ob->query($str);
	}
	if(isset($_POST['sub']))
	{
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['is_active'] = (isset($_POST['status']) ? '1' : '0');
		$data['date'] = date('y-m-d',strtotime($_POST['date']));
		if($ob->update('news', $data, $_POST['id']))
		{
			$succ = 'News Updated successfully.';
			header('location:news.php');
		}
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
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
	<link href="../assets/css/bootstrap-switch.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/jquery-ui.css" rel="stylesheet" />
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
						Edit News
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Edit News Form
                        </div>
                        <div class="panel-body">
							<?php
								if(isset($err['img']))
								{
							?>
							<div class="alert alert-danger">
								<?= $err['img']?>
							</div>
							<?php
								}
							?>
							<?php
								if(isset($succ) && $succ)
								{
									echo '<div class="alert alert-success">'.$succ.'</div>';
								}
							?>
							<!-- Form -->
							<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-group">
									<label for="category" class="control-label col-sm-2">Title : <label style="color:red">*</label></label>
									<div class="col-sm-5">
										<input type="text"  name="title" class="form-control" value="<?=$row[0]['title']?>" required/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="category" class="control-label col-sm-2">Discription : <label style="color:red">*</label></label>
									<div class="col-sm-5">
										<textarea name="description" class="form-control" required><?=$row[0]['description']?></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label for="category" class="control-label col-sm-2">Status : <label style="color:red">*</label></label>
									<div class="col-sm-5">
										<input type="checkbox"  name="status" <?=$row[0]['is_active'] == '1' ? 'checked' : ''?>/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="category" class="control-label col-sm-2">Date : <label style="color:red">*</label></label>
									<div class="col-sm-5">
										<input name="date" class="form-control" value="<?=$row[0]['date']?>" required/>
									</div>
								</div>
								<div class="col-sm-12 col-sm-offset-2">
									<input type="hidden" name="id" value="<?=$row[0]['id']?>"/>
									<button type="submit" name="sub" class="btn btn-success">Submit</button>&nbsp;
									<a href="news.php" class="btn btn-primary">Cancel</a>
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
    <script src="assets/js/jquery-ui.js"></script>
	<script src="../assets/js/bootstrap-switch.js"></script>
	<script>
		$('[name="status"]').bootstrapSwitch();
		$('[name="date"]').datepicker({
			minDate : new Date('<?=$row[0]['date']?>')
		});
	</script>
    <!-- CUSTOM SCRIPTS -->
</body>
</html>