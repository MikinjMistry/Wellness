<?php
	if(isset($_POST['submit']))
	{
		require_once '../api/wellness.php';
		$obj = new wellness();
		$data = array();
		$data['name'] = $_POST['update_course'];
		$status = $obj->update('course',$data,$_POST['course_id']);
		$obj->deleteByColumn('course_state','course_id',$_POST['course_id']);
		foreach($_POST['updated_states'] as $state_id)
		{
			$cs = array();
			$cs['course_id'] = $_POST['course_id'];
			$cs['state_id'] = $state_id;
			$status = $obj->insert('course_state',$cs);
		}
		header('Location:course.php');
	}
?>