<?php
include_once ('dbconnect.php'); 
$country_id= $_POST['country'];  
$stateName= $_POST['stateName'];    
$q1="select count(*) as totalfound from state_data where country_id='$country_id' AND statename='$stateName'"; 
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalfound=$r1->totalfound ; 
if($totalfound <> 0)
echo '<span class="bold text-danger">Already Added</span>'; 
?>