<?php 
include_once ('dbconnect.php');
$rankingid= $_POST['rankingid'];
$rankposition= $_POST['rankposition'];
$rankyear= $_POST['rankyear'];
$rankfield= $_POST['rankfield']; 
$college_name=$_SESSION['college_name'];
 
if(!empty($rankingid) AND (!empty($rankposition)) AND (!empty($rankyear)) AND (!empty($college_name)))
{
	$q1="select * from ranking_type where rank_id ='$rankingid'"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{ 
		$r1 = mysqli_fetch_object($qr1);  
		$body_name = $r1->body_name;
		$rank_value = $r1->rank_value;
		$rankfield = mysqli_real_escape_string($conn, $rankfield);
		$rankfield = ucwords($rankfield);
		
	  $q3="select * from college_ranking_data where college_id ='$college_name' AND ranking_id= '$rankingid' AND ranking_position= '$rankposition' AND ranking_year= '$rankyear' AND ranking_field= '$rankfield'"; 
	  $qr3=mysqli_query($conn, $q3) or die($q3.mysqli_error($conn)); 
	  $found_data1=mysqli_num_rows($qr3);
	  if($found_data1 == 0)
	  { 
		$q = "insert into college_ranking_data values(null,'$college_name','$rankingid','$body_name','$rank_value','$rankposition','$rankyear','$rankfield','','','','','')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo 'error';
		} 
		else
		{
			echo 'ok';
		}
	  }
	  else
		{
			echo 'added';
		} 
	}
}
else
  echo 'fail';
?>