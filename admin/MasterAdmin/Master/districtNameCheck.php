<?php
include_once ('dbconnect.php'); 
$country_id= $_POST['country'];  
$state_id= $_POST['state_id'];    
$districtName= $_POST['districtName'];    
$q1="select count(*) as totalfound from district_data where country_id='$country_id' AND state_id=$state_id AND district_name='$districtName'"; 
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalfound=$r1->totalfound ; 
if($totalfound <> 0)
echo '<span class="bold text-danger">Already Added</span>'; 
?>