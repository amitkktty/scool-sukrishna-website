<?php 
include_once ('dbconnect.php');
$college_approved_id= $_POST['college_approved_id'];
$college_name=$_SESSION['college_name'];
if(!empty($college_name) AND (!empty($college_approved_id)))
{
	$q = "delete from college_approved_by where college_id = 
	'$college_name' AND college_approved_id = $college_approved_id";
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