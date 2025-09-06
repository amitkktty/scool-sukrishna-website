<?php 
include_once ('dbconnect.php');
$courseid= $_POST['courseid'];
$streamid= $_POST['streamid'];
$coursefee= $_POST['coursefee'];
$college_name=$_SESSION['college_name'];
 
if(!empty($college_name) AND (!empty($courseid)) AND (!empty($streamid)) AND (!empty($coursefee)))
{
	$q1="select * from course_name where course_id ='$courseid'"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{ 
		$r1 = mysqli_fetch_object($qr1);  
		$course_name1 = $r1->course_name;
		
		$q2="select * from stream where stream_id ='$streamid'"; 
		$qr2=mysqli_query($conn, $q2) or die($q2.mysqli_error($conn)); 
		$found_data2=mysqli_num_rows($qr2);
		if($found_data2 > 0)
		{ 
			$r2 = mysqli_fetch_object($qr2);  
			$stream_name2 = $r2->stream_name;			
			$coursefee = $coursefee + 0;
			$q3="select * from college_course_name where college_id ='$college_name' AND course_id= '$courseid' AND stream_id= '$streamid' AND course_fee= '$coursefee'"; 
			$qr3=mysqli_query($conn, $q3) or die($q3.mysqli_error($conn)); 
			$found_data1=mysqli_num_rows($qr3);
			if($found_data1 == 0)
			{ 
				$q = "insert into college_course_name values(null,'$college_name','$streamid','$stream_name2','$courseid','$course_name1','$coursefee')";
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
		else
			echo 'fail';
	}
	  else
		echo 'notfound'; 	
}
else
  echo 'empty';
?>