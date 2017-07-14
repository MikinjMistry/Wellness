<?php
	require_once '../../api/wellness.php';
	$ob = new wellness();
	$data['is_read'] = $_POST['status'] == 'true' ? '1' : '0';
	$ob->update('inquiry', $data, $_POST['id']);
?>