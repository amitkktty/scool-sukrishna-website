<?php 
include_once ('dbconnect.php');
$college_c_b_id= $_POST['college_c_b_id'];
$college_name=$_SESSION['college_name'];
if(!empty($college_name) AND (!empty($college_c_b_id)))
{
	$q = "delete from college_course_name_branch where college_id = 
	'$college_name' AND college_c_b_id  = $college_c_b_id";
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