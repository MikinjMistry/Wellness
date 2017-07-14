<?php
	if(isset($_POST['submit']))
	{
		require_once '../api/wellness.php';
		$obj = new wellness();
		$data = array();
		$data['name'] = $_POST['update_category'];
		$status = $obj->insert('category',$data);
		header('Location:category.php');
	}
?>