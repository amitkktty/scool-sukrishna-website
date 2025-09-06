<?php 
include_once ('dbconnect.php');
$streamid= $_POST['streamid'];
$courseid= $_POST['courseid'];
$examid= $_POST['examid']; 
 
if(!empty($examid) AND (!empty($courseid)) AND (!empty($streamid)))
{
	$q1="select * from exam_detail where stream_id ='$streamid' AND  course_id ='$courseid' AND  exam_name_id ='$examid' "; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{ 
		echo 'added';
	}
} 
?>