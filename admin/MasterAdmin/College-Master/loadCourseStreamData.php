<?php 
include_once ('dbconnect.php'); 
$college_name=$_SESSION['college_name'];
if(!empty($college_name))
{
?> 
<select required='' id='stream' name="addStream" class='form-control form-control-sm' onchange="getCourseName(this.value)">
	<option value="">-- Select Stream --</option>
	<?php
	$q10 = "select * from college_stream where college_id='$college_name' order by stream_name";
	$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
	while ($r10 = mysqli_fetch_object($qr10)) {
		$stream_id   = $r10->stream_id ;
		$stream_name = $r10->stream_name;
	?>
		<option value="<?php echo $stream_id ; ?>" >
			<?php echo $stream_name; ?>
		</option>
	<?php
	}
	?>
	</select>
<?php
} 
?>