<?php 
include_once ('dbconnect.php'); 
$adv_id=$_GET['adv_id']; 
if(empty($adv_id))
{
	echo "<script>window.location.href='Add-Adv';</script>";
}
else
{
	$q10 = "select * from adv_data where adv_id  ='$adv_id'";
	$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
	$data_found=mysqli_num_rows($qr10);
	if($data_found == 1)
	{
		$r10=mysqli_fetch_object($qr10);
		$adv_file_name1 = $r10->adv_file_name;
		
		$filelocation = 'Adv_Img/'.$adv_file_name1;

		if(!empty($adv_file_name1))
		  unlink($filelocation);	
		 
	    $q = "delete from adv_data where adv_id  ='$adv_id'";
		if (!mysqli_query($conn, $q)) 
		{
			 $message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo "<script>window.location.href='Add-Adv';</script>";			 
		}  
		else 
			echo "<script>window.location.href='Add-Adv';</script>";
	}
}
?>