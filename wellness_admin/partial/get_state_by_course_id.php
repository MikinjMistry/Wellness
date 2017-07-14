<?php
	if(isset($_POST['course_id']))
	{
		require_once '../../api/wellness.php';
		$obj = new wellness();
		$result = $obj->query("select s.id,s.name from state s join course_state cs where s.id = cs.state_id and cs.course_id = ".$_POST['course_id']);
		echo json_encode($result);
	}
?>