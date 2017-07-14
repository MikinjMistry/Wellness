<?php
	require_once '../api/wellness.php';
	$ob = new wellness();
	$category = $ob->select('category');
	 
	function compress($info, $source, $destination, $quality) {

		if ($info == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);

		elseif ($info == 'image/gif') 
			$image = imagecreatefromgif($source);

		elseif ($info == 'image/png') 
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}


	if(isset($_POST['sub']))
	{
		$type = array('image/jpg','image/png','image/jpeg','image/gif');
		$err = array();
		if(!empty($_FILES['img']['name']) && isset($_FILES['img']))
		{
			if(in_array($_FILES['img']['type'], $type))
			{
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$mime = finfo_file($finfo, $_FILES['img']['tmp_name']);
				$tmparr = explode('.', $_FILES['img']['name']);
				$filename = time().'.'.$tmparr[count($tmparr) - 1];
				if(!move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/gallery/'.$filename))
				{
					 echo 'File not uploaded';
				}
				$d = compress($mime, '../uploads/gallery/'.$filename , $filename, 80);
				
				$data['image_path'] = $filename;
				$data['title'] = $_POST['title'];
				if(isset($_POST['status']))
				{
					$data['is_active'] = '1';
				}
				$data['cat_id'] = $_POST['cat_id'];
				$ob->insert('gallery', $data);
				$succ = true;
			}
			else
			{
				$err['img'] = 'Invalid image type.';
			}
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
						Add new gallery
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Add gallery
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
									echo '<div class="alert alert-success">Image added successfully.</div>';
								}
							?>
							<!-- Form -->
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>Title</label>
									<div class="">
										<input name="title" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<label for="category">Image : <label style="color:red">*</label></label>
									<div class="">
										<input type="file"  name="img"/>
										<span style="color:red">Note! image upload diemension 370 X 220 pixel.</span>
									</div>
								</div>
								<div class="form-group">
									<label for="category">Status : <label style="color:red">*</label></label>
									<div class="">
										<input type="checkbox"  name="status" checked/>
									</div>
								</div>
								<div class="form-group">
									<label for="category">Category : <label style="color:red">*</label></label>
									<div class="">
										<select class="form-control" name="cat_id">
											<?php
												foreach($category as $val)
												{
													echo '<option value='.$val['id'].'>'.$val['name'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								<button type="submit" name="sub" class="btn btn-success">Submit</button>&nbsp;
								<a href="gallery.php" class="btn btn-primary">Cancel</a>
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
	<script src="../assets/js/bootstrap-switch.js"></script>
	<script>
		$('[name="status"]').bootstrapSwitch();
	</script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>