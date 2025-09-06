<?php 
include_once ('dbconnect.php');
$r_id= $_POST['r_id'];
$college_name=$_SESSION['college_name'];
if(!empty($college_name) AND (!empty($r_id)))
{
	$q = "delete from college_ranking_data where college_id = 
	'$college_name' AND r_id = '$r_id'";
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