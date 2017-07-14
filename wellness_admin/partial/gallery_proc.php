<?php
	require_once '../../api/wellness.php';
	$ob = new wellness();
	$data['is_active'] = ($_POST['status'] == 'true' ? '1' : '0');
	$ob->update('gallery', $data, $_POST['id']);
?>