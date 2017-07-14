<?php
	require_once '../../api/wellness.php';
	$ob = new wellness();
	$str = 'select i.*, c.name as cname, s.name as sname 
			from inquiry i 
			left join course c on c.id = i.course_id 
			left join state s on s.id = i.state_id
			where i.id = '.$_POST['id'];
	$row = $ob->query($str);
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Student Name</td>
		<td><?=$row[0]['student_name']?></td>
	</tr>
	<tr>
		<td>Father Name</td>
		<td><?=$row[0]['father_name']?></td>
	</tr>
	<tr>
		<td>Date of birth</td>
		<td><?=date('',strtotime($row[0]['student_name']))?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><?=$row[0]['address']?></td>
	</tr>
	<tr>
		<td>Phone Number</td>
		<td><?=$row[0]['mobile_no']?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?=$row[0]['email']?></td>
	</tr>
	<tr>
		<td>Percentage</td>
		<td><?=$row[0]['percentage'].'%'?></td>
	</tr>
	<tr>
		<td>Message</td>
		<td><?=$row[0]['message']?></td>
	</tr>
	<tr>
		<td>User Ip</td>
		<td><?=$row[0]['user_ip']?></td>
	</tr>
	<tr>
		<td>Course</td>
		<td><?=$row[0]['cname']?></td>
	</tr>
	<tr>
		<td>State</td>
		<td><?=$row[0]['sname']?></td>
	</tr>
	<tr>
		<td>Date</td>
		<td><?=date('d, M Y', strtotime($row[0]['student_name']))?></td>
	</tr>
	<tr>
		<td>Is Read</td>
		<td><?=$row[0]['is_read'] == '1' ? 'YES' : 'No'?></td>
	</tr>
</table>