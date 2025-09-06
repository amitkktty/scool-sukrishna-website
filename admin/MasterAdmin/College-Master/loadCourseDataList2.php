<?php 
include_once ('dbconnect.php'); 
$college_name=$_SESSION['college_name'];
if(!empty($college_name))
{
?>
<table class='table table-sm bg-white table-bordered' id='course_name_branch_list'>
<tr class='bg-cyanlight'>
	<td width="7%">#</td>
	<td>Stream</td>
	<td>Course Type</td>
	<td>Course Name</td>
	<td>Branch Name</td>
	<td>Course Fee</td>
	<td width="5%"></td>
</tr>
<?php 
$sn = 1;
$q1 = "select * from college_course_name_branch where college_id='$college_name' order by stream_name";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
 while ($r1 = mysqli_fetch_object($qr1)) 
 {
	$college_c_b_id  = $r1->college_c_b_id ;
	$stream_name3 = $r1->stream_name;
	$course_type3 = $r1->course_type_name;
	$course_name3 = $r1->course_name;
	$branch_name3 = $r1->branch_name;
	$course_fee3 = $r1->course_fee;
?>
<tr class="small bold">
	<td><?php echo $sn; ?></td> 
	<td><?php echo $stream_name3; ?></td>
	<td><?php echo $course_type3; ?></td>
	<td><?php echo $course_name3; ?></td>
	<td><?php echo $branch_name3; ?></td>
	<td><?php echo $course_fee3; ?></td>
	<td><span onclick="deleteCourseNameBranch('<?php echo $college_c_b_id;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
</tr>
<?php
		$sn++;
	}
}
	?>
</table>
<?php
} 
else
{
?>
<table class='table table-sm bg-white table-bordered' id='course_name_branch_list'>
<tr class='bg-cyanlight'>
	<td width="7%">#</td>
	<td>Stream</td>
	<td>Course Type</td>
	<td>Course Name</td>
	<td>Branch Name</td>
	<td>Course Fee</td>
	<td width="5%"></td>
</tr>
</table>
<?php 	
}
?>