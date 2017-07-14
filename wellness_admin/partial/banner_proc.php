<?php
	require_once '../../api/wellness.php';
	$ob = new wellness();
	$id = $_POST['id'];
	$data['is_active'] = $_POST['status'] == 'true' ? '1' : '0';
	if($ob->update('banner', $data, $id))
	{
		echo '1';
	}
	else
	{
		echo '0';
	}
?>