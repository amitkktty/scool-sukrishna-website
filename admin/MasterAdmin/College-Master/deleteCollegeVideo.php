<?php 
include_once ('dbconnect.php');
$vid= $_GET['vid'];
$college_name=$_SESSION['college_name'];
$backlink = $_SESSION['backlink']; 
if(!empty($college_name) AND (!empty($vid)))
{
	$q1 = "select * from college_video_gallery where vid= '$vid' AND college_id = '$college_name'";
	$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
	$found_data=mysqli_num_rows($qr1);
	if($found_data == 1) 
	{	    
		$q = "delete from college_video_gallery where vid= '$vid' AND college_id = '$college_name'";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn); 
			 echo 'error';
		}
		else
		{
			echo "<form action=".$backlink." method=post name=main></form>
			<script>document.main.submit(); </script>";	
		}		 
	}
	else
	{
		 echo "<script>alert('Illigal Activity. Try Again!');</script>"; 
		echo "<form action=".$backlink." method=post name=main></form>
		<script>document.main.submit(); </script>";	 
	}
} 
else
{ 
	echo "<script>alert('Illigal Activity. Try Again!');</script>"; 
	echo "<form action=".$backlink." method=post name=main></form>
	<script>document.main.submit(); </script>";	

}	

?>