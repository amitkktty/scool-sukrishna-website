<?php 
include_once ('dbconnect.php');
$gid= $_GET['gid'];
$college_name=$_SESSION['college_name'];
$backlink = $_SESSION['backlink']; 
if(!empty($college_name) AND (!empty($gid)))
{
	$q1 = "select * from college_image_gallery where gid= '$gid' AND college_id = '$college_name'";
	$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
	$found_data=mysqli_num_rows($qr1);
	if($found_data == 1) 
	{
		$r1 = mysqli_fetch_object($qr1);
		$gid   = $r1->gid  ;
		$image_name = $r1->image_name;
		$filename1= 'College_Personal_Gallery/'.$image_name;
		
		if(!empty($image_name))
		unlink($filename1);			
	    
		$q = "delete from college_image_gallery where gid= '$gid' AND college_id = '$college_name'";
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