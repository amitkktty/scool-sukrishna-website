<?php 
include_once ('dbconnect.php');
$f_id= $_POST['f_id'];
$college_name=$_SESSION['college_name'];
if(!empty($college_name) AND (!empty($f_id)))
{
	$q = "delete from all_college_facilities where college_id = 
	'$college_name' AND f_id = '$f_id'";
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