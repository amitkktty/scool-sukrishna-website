<?php 
include_once ('dbconnect.php');
$streamid= $_POST['streamid'];
$courseid= $_POST['courseid'];
$exam_name= $_POST['exam_name']; 
$old_exam_id= $_POST['old_exam_id']; 
 
if(!empty($exam_name) AND (!empty($courseid)) AND (!empty($streamid)) AND (!empty($old_exam_id)))
{
	$q1="select * from exam_detail where stream_id ='$streamid' AND  course_id ='$courseid' AND  exam_name_id  ='$exam_name' "; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$found_data=mysqli_num_rows($qr1);
	if($found_data  > 1)
	{ 
		echo 'added';
	}
} 
?>