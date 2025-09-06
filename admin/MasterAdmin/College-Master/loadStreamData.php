<?php 
include_once ('dbconnect.php'); 
$college_name=$_SESSION['college_name'];
if(!empty($college_name))
{
?>
<table class='table table-sm bg-white' id='stream_list'>
					<tr class='bg-cyanlight'>
						<td width="20%">#</td>
						<td>Stream Name</td>
						<td width="20%"></td>
					</tr>
					<?php 
$sn = 1;
$q1 = "select * from college_stream where college_id='$college_name' order by stream_name";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
 while ($r1 = mysqli_fetch_object($qr1)) 
 {
	$college_stream_id2  = $r1->college_stream_id ;
	$stream_name2 = $r1->stream_name;
?>
<tr class="header">
	<td><?php echo $sn; ?></td> 
	<td><?php echo $stream_name2; ?></td>
	<td><span onclick="deleteStream('<?php echo $college_stream_id2;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
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
<table class='table table-sm bg-white' id='stream_list'>
<tr class='bg-cyanlight'> 
<td width="20%">#</td>
<td>Stream Name</td>
<td width="20%"></td>
</table>
<?php	
}
?>