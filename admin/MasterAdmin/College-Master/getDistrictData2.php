<?php
include_once ('dbconnect.php'); 
$state_id= $_POST['state_id1']; 

?>  
	<option value="">-- Select --</option>
	<?php
	$q10="select * from district_data where state_id ='$state_id' order by district_name";
	$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
	while($r10=mysqli_fetch_object($qr10))
	{ 
		$district_id1 =$r10->district_id  ;
		$district_name1=$r10->district_name ;
		echo '<option value="'.$district_id1.'">'.$district_name1.'</option>';
	}
	?>
 