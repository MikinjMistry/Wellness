<?php
	if(isset($_POST['submit']))
	{
		require_once '../api/wellness.php';
		$obj = new wellness();
		$data = array();
		$data['name'] = $_POST['update_category'];
		$status = $obj->update('category',$data,$_POST['category_id']);
		header('Location:category.php');
	}
?>