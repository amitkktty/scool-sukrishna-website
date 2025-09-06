<?php 
include_once ('dbconnect.php');
$streamid= $_POST['streamid'];
$course_type_id= $_POST['coursetype'];
$courseid= $_POST['courseid'];
$branchnameid= $_POST['branchid'];
$coursefee= $_POST['coursefee'];
$college_name=$_SESSION['college_name'];
 
if(!empty($college_name) AND (!empty($course_type_id)) AND (!empty($courseid)) AND (!empty($streamid)) AND (!empty($coursefee)) AND (!empty($branchnameid)))
{
	$q2="select * from stream where stream_id ='$streamid'"; 
	$qr2=mysqli_query($conn, $q2) or die($q2.mysqli_error($conn)); 
	$r2 = mysqli_fetch_object($qr2);  
	$stream_name2 = $r2->stream_name;			

	$q1="select * from course_type where course_type_id ='$course_type_id'"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$r1 = mysqli_fetch_object($qr1);  
	$course_type_name = $r1->course_type_name;
	
	$q1="select * from course_name where course_id ='$courseid'"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$r1 = mysqli_fetch_object($qr1);  
	$course_name1 = $r1->course_name;
		
	$q1="select * from course_name_branch where course_branch_id ='$branchnameid'"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$r1 = mysqli_fetch_object($qr1);  
	$course_branch_name = $r1->course_branch_name;
		
	$coursefee = $coursefee + 0;
	
	$q3="select * from college_course_name_branch where college_id ='$college_name' AND stream_id= '$streamid' AND course_type_id= '$course_type_id' AND course_id= '$courseid' AND branch_id= '$branchnameid' AND course_fee= '$coursefee'"; 
	$qr3=mysqli_query($conn, $q3) or die($q3.mysqli_error($conn)); 
	$found_data1=mysqli_num_rows($qr3);
	if($found_data1 == 0)
	{ 
		$q = "insert into college_course_name_branch values(null,'$college_name','$streamid','$stream_name2','$course_type_id','$course_type_name','$courseid','$course_name1','$branchnameid','$course_branch_name','$coursefee')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo 'fail1';
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
  echo 'fail2';
?>