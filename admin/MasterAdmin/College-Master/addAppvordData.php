<?php 
include_once ('dbconnect.php');
$approved_by_id= $_POST['approved_by_id'];
$college_name=$_SESSION['college_name'];
if(!empty($college_name) AND (!empty($approved_by_id)))
{
	$q1="select * from approved_by where approver_id ='$approved_by_id'"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{ 
		$r1 = mysqli_fetch_object($qr1);  
		$approved_name = $r1->approver_name;
		
		$q3="select * from college_approved_by where college_id ='$college_name' AND approved_id= '$approved_by_id'"; 
		$qr3=mysqli_query($conn, $q3) or die($q3.mysqli_error($conn)); 
		$found_data1=mysqli_num_rows($qr3);
		if($found_data1 == 0)
		{ 
			$q = "insert into college_approved_by values(null,'$college_name','$approved_by_id','$approved_name')";
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