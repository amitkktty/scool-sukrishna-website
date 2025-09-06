<?php
include_once ('dbconnect.php');  
$app_name= $_POST['app_name'];   
$approved_by = ucwords(mysqli_real_escape_string($conn, $app_name)); 
$approved_by = trim(strip_tags($approved_by));
$q1="select count(*) as totalfound from affiliation_name where affiliation_name='$approved_by'"; 
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalfound=$r1->totalfound ; 
if($totalfound <> 0)
echo "This is already added";
else
{
	$approved_by = ucwords(mysqli_real_escape_string($conn, $approved_by));
	$q = "insert into affiliation_name values(null,'$approved_by','$currentdt', '', '', '', '', '')";
	if (!mysqli_query($conn, $q)) {
		$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
		echo $message;
	} else 
	{
		echo "Added";
	}	
}




?>
