<?php 
include_once ('dbconnect.php'); 
$streamid=$_POST['streamid'];
$college_name=$_SESSION['college_name'];
if(!empty($streamid))
{
?>
<select class='form-control form-control-sm' name='course_name' id='course_name' >
	<option value="">-- Select Course --</option>
<?php  
	$q1 = "select * from course_name where stream_id='$streamid' order by course_name";
	$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{
		while ($r1 = mysqli_fetch_object($qr1)) 
		{
		$course_id1  = $r1->course_id  ;
		$course_name1 = $r1->course_name;
		?>
		<option value="<?php echo $course_id1;?>"><?php echo $course_name1;?></option>
		<?php 
		} 
	}
}
?>