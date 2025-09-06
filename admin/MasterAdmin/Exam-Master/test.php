<?php include_once('dbconnect.php');   

$sql1="select * from exam_detail";
$qr1=mysqli_query($conn, $sql1) or die($sql1.mysqli_error($conn));
while($r1=mysqli_fetch_object($qr1))
{ 
$exam_added_id = $r1->ex_id; 
$exam_slug = $r1->exam_slug; 
$exam_title = $r1->exam_title; 
$apply_process = $r1->apply_process;  
$syllabus = $r1->syllabus;  
$prepare_process = $r1->prepare_process; 
if(!empty($apply_process))
{
	$q3 = "insert into exam_detail_extra values(null,'$exam_added_id','$exam_slug','Apply Process','$apply_process','$currentdt','$exam_title','','','')";
	mysqli_query($conn, $q3);
}
if(!empty($syllabus))
{
	$q3 = "insert into exam_detail_extra values(null,'$exam_added_id','$exam_slug','Syllabus','$syllabus','$currentdt','$exam_title','','','')";
	mysqli_query($conn, $q3);	
}
if(!empty($prepare_process))
{
	$q3 = "insert into exam_detail_extra values(null,'$exam_added_id','$exam_slug','How to Prepare','$prepare_process','$currentdt','$exam_title','','','')";
	mysqli_query($conn, $q3);	
}
}	

	
 echo 'all done';

?>	
