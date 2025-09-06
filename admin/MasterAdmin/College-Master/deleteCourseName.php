<?php 
include_once ('dbconnect.php');
$college_course_name_id= $_POST['college_course_name_id'];
$college_name=$_SESSION['college_name'];
if(!empty($college_name) AND (!empty($college_course_name_id)))
{
	$q = "delete from college_course_name where college_id = 
	'$college_name' AND college_course_name_id  = $college_course_name_id";
	if (!mysqli_query($conn, $q)) 
	{
		$message = "Error description:  " . $q . "<br>" . mysqli_error($conn); 
		 echo 'error';
	}
	else 
		echo 'ok';
}
else
  echo 'fail';
?>