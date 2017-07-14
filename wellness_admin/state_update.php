<?php
	if(isset($_POST['submit']))
	{
		require_once '../api/wellness.php';
		$obj = new wellness();
		$data = array();
		$data['name'] = $_POST['state'];
		$data['is_active'] = (isset($_POST['status'])? "1":"0");
		$status = $obj->update('state',$data,$_POST['state_id']);
		header('Location:state.php');
	}
?>