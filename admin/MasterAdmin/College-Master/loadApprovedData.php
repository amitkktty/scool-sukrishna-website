<?php 
include_once ('dbconnect.php'); 
$college_name=$_SESSION['college_name'];
if(!empty($college_name))
{
?>
<table class='table table-sm bg-white' id='approvedlist'>
<tr class='bg-cyanlight'> 
<td width="20%">#</td>
<td>Approved Body Name</td>				
<td width="20%">Action</td>
</tr>
<?php
$sn = 1;
$q1 = "select * from college_approved_by where college_id='$college_name' order by approved_name";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
 while ($r1 = mysqli_fetch_object($qr1)) 
 {
	$college_approved_id1  = $r1->college_approved_id ;
	$approved_name1 = $r1->approved_name;
?>
<tr class="header">
	<td><?php echo $sn; ?></td> 
	<td><?php echo $approved_name1; ?></td>
	<td><span onclick="deleteApprovedBy('<?php echo $college_approved_id1;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
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
<table class='table table-sm bg-white' id='approvedlist'>
<tr class='bg-cyanlight'> 
<td width="20%">#</td>
<td>Approved Body Name</td>				
<td width="20%">Action</td>
</tr>
</table>
<?php	
}
?>