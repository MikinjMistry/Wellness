<?php
	require_once '../../api/wellness.php';
	$ob = new wellness();
	$id = $_POST['id'];
	$data['is_attend'] = $_POST['status'] == 'true' ? '1' : '0';
	$ob->update('subscriber', $data, $id);
?>