<?php 
include_once ('dbconnect.php');
$college_stream_id= $_POST['college_stream_id'];
$college_name=$_SESSION['college_name'];
if(!empty($college_name) AND (!empty($college_stream_id)))
{
		$q1 = "select * from college_stream where college_id='$college_name' AND college_stream_id = '$college_stream_id'";
		$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
		$r1 = mysqli_fetch_object($qr1) ;
		$stream_id  = $r1->stream_id ;
		
	
	$q10 = "select * from college_course_name where college_id = 
	'$college_name' AND stream_id = '$stream_id'";
	$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
	$data_found=mysqli_num_rows($qr10);
	if($data_found == 0)
	{
		$q = "delete from college_stream where college_id = 
		'$college_name' AND college_stream_id = $college_stream_id";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn); 
			 echo 'error';
		}
		else 
			echo 'ok';  
	}
	else
	echo 'found';
}
else
  echo 'fail';
?>