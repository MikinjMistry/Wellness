<?php
	if(isset($_POST['cat_id']))
	{
		require_once '../api/wellness.php';
		$obj = new wellness();
		echo $obj->delete('college',$_POST['cat_id']);
	}
?>