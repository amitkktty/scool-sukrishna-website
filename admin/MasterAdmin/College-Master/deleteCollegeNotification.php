<?php 
include_once ('dbconnect.php');
$nid= $_GET['nid'];
$college_name=$_SESSION['college_name'];
$backlink = $_SESSION['backlink']; 
if(!empty($college_name) AND (!empty($nid)))
{
	$q1 = "select * from college_personal_notification where nid= '$nid' AND college_id = '$college_name'";
	$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
	$found_data=mysqli_num_rows($qr1);
	if($found_data == 1) 
	{
		$r1 = mysqli_fetch_object($qr1);
		$nid   = $r1->nid  ;
		$notification_doc = $r1->notification_doc;
		$filename1= 'College_Notification/'.$notification_doc;
		
		if(!empty($notification_doc))
		unlink($filename1);			
	    
		$q = "delete from college_personal_notification where nid= '$nid' AND college_id = '$college_name'";
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