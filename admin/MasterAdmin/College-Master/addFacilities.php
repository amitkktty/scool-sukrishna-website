<?php 
include_once ('dbconnect.php');
$facilities= $_POST['facilities']; 
$college_name=$_SESSION['college_name'];
 
if(!empty($facilities) AND (!empty($college_name)))
{
	$q1="select * from college_facilities where facilities_id  ='$facilities'"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{ 
		$r1 = mysqli_fetch_object($qr1);  
		$facilities_name = $r1->facilities_name; 
		$facilities_img = $r1->facilities_img; 
		
	  $q3="select * from all_college_facilities where college_id='$college_name' AND facilities_id= '$facilities'"; 
	  $qr3=mysqli_query($conn, $q3) or die($q3.mysqli_error($conn)); 
	  $found_data1=mysqli_num_rows($qr3);
	  if($found_data1 == 0)
	  { 
		$q = "insert into all_college_facilities values(null,'$college_name','$facilities','$facilities_name','$facilities_img','','','','','')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo 'error';
		} 
		else
		{
			echo 'ok';
		}
	  }
	  else
		{
			echo 'added';
		} 
	}
}
else
  echo 'fail';
?>