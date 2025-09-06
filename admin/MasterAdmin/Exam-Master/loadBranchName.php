<?php
include_once ('dbconnect.php');  
$streamid= $_POST['streamid']; 
$courseid= $_POST['courseid'];  
if((!empty($streamid)) && (!empty($courseid)))
{
?>  
<option value="">-- Select --</option>
<?php
$q10="select * from course_name_branch where stream_id = '$streamid' AND course_name_id='$courseid' order by course_branch_name";
$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
$totaldata=mysqli_num_rows($qr10);
 if($totaldata > 0)
 {
	while($r10=mysqli_fetch_object($qr10))
	{ 
	$course_branch_id1=$r10->course_branch_id   ;
	$course_branch_name1=$r10->course_branch_name ;
	?>
	<option value="<?php echo $course_branch_id1;?>" <?php if($branch_name == $course_branch_id1) echo ' selected';?> ><?php echo $course_branch_name1;?></option> 

	<?php 
	}
 }
}
?>
