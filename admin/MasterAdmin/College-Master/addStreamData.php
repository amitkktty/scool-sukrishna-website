<?php 
include_once ('dbconnect.php');
$streamid= $_POST['streamid'];
$college_name=$_SESSION['college_name'];
if(!empty($college_name) AND (!empty($streamid)))
{
	$q1="select * from stream where stream_id ='$streamid'"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{ 
		$r1 = mysqli_fetch_object($qr1);  
		$stream_name1 = $r1->stream_name;
		
		$q3="select * from college_stream where college_id ='$college_name' AND stream_id= '$streamid'"; 
		$qr3=mysqli_query($conn, $q3) or die($q3.mysqli_error($conn)); 
		$found_data1=mysqli_num_rows($qr3);
		if($found_data1 == 0)
		{ 
			$q = "insert into college_stream values(null,'$college_name','$streamid','$stream_name1')";
			if (!mysqli_query($conn, $q)) 
			{
				$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
				echo 'fail';
			} 
			else
			{
				echo 'ok';
			}
		}
		else 
		echo 'added';
	}	
}
else
  echo 'fail'	;
?>