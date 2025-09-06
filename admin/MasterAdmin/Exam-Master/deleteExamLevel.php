<?php 
include_once ('dbconnect.php'); 
$id=$_GET['id']; 
if(empty($id))
{
	echo "<script>window.location.href='Exam-Level';</script>";
}
else
{
	$q10 = "select * from exam_level where exm_id  ='$id'";
	$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
	$data_found=mysqli_num_rows($qr10);
	if($data_found == 1)
	{
	    $q = "delete from exam_level where exm_id = '$id'";
		if (!mysqli_query($conn, $q)) 
		{
			 $message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo "<script>window.location.href='Exam-Level';</script>";			 
		}
		else 
			echo "<script>window.location.href='Exam-Level';</script>";
	}
}
?>