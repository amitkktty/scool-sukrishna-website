<?php 
include_once ('dbconnect.php'); 
$college_name=$_SESSION['college_name'];
if(!empty($college_name))
{
?>
<table class='table table-sm bg-white table-bordered' id='course_name_list'>
<tr class='bg-cyanlight'>
	<td width="10%">#</td>
	<td>Stream Name</td>
	<td>Course Name</td>
	<td>Course Fee</td>
	<td width="10%"></td>
</tr>
<?php 
$sn = 1;
$q1 = "select * from college_course_name where college_id='$college_name' order by stream_name";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
 while ($r1 = mysqli_fetch_object($qr1)) 
 {
	$college_course_name_id2  = $r1->college_course_name_id ;
	$stream_name2 = $r1->stream_name;
	$course_name2 = $r1->course_name;
	$course_fee2 = $r1->course_fee;
?>
<tr class="header">
	<td><?php echo $sn; ?></td> 
	<td><?php echo $stream_name2; ?></td>
	<td><?php echo $course_name2; ?></td>
	<td><?php echo $course_fee2; ?></td>
	<td><span onclick="deleteCourseName('<?php echo $college_course_name_id2;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
</tr>
<?php
		$sn++;
	}
}
	?>
</table>
<?php
} 
?>