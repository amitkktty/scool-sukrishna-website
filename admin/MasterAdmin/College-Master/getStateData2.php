<?php
include_once ('dbconnect.php'); 
$country_id= $_POST['country_id']; 

?> 
<!--
<select required='' name="state_id" class='form-control form-control-sm' onchange='stateNameSet(this.value)'>  -->
	<option value="">-- Select --</option>
	<?php
	$q10="select * from state_data where country_id ='$country_id' order by statename";
	$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
	while($r10=mysqli_fetch_object($qr10))
	{ 
		$state_id1=$r10->state_id ;
		$state_name=$r10->statename ;
		echo '<option value="'.$state_id1.'">'.$state_name.'</option>';
	}
	?>
 