<?php 
include_once ('dbconnect.php'); 
$streamid=$_POST['streamid']; 
if(!empty($streamid))
{
?>
	<option value="">-- Select --</option>
<?php  
	$q1 = "select * from course_name where stream_id='$streamid' group by course_name  order by course_name ";
	$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{
		while ($r1 = mysqli_fetch_object($qr1)) 
		{
		$course_id1  = $r1->course_id  ;
		$coursename = $r1->course_name;
		?>
		<option value="<?php echo $course_id1;?>" <?php if($course_name == $course_id1) echo ' selected';?> ><?php echo $coursename;?></option> 

		<?php 
		} 
	}
}
?>