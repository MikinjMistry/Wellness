<?php
	if(isset($_POST['course_id']))
	{
		require_once '../../api/wellness.php';
		$obj = new wellness();
		$result = $obj->query("select cs.id as id,s.id as state_id,s.name from state s join course_state cs where s.id = cs.state_id and cs.course_id = ".$_POST['course_id']);
		foreach($result as $record)
		{
			echo "<option value='".$record['id']."'>".$record['name']."</option>";
		}
	}
?>