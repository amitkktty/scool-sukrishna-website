<?php
include_once ('dbconnect.php');
$cid=$_GET['c_id'];
unset($_SESSION['college_name']);
$_SESSION['college_name']= $cid;
$q1="select * from college_data where c_id  ='$cid'";
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$c_id=$r1->c_id ;
$state1=$r1->state1 ;
$district1=$r1->district1 ;
$name1=$r1->college_name; 
$q0="select * from state_data where state_id = '$state1'";
$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
$r0=mysqli_fetch_object($qr0);
$state_name=$r0->statename ; 
$q0="select * from district_data where district_id = '$district1'";
$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
$r0=mysqli_fetch_object($qr0);
$district_name=$r0->district_name ;  		
$location=$district_name.', '.$state_name;
unset($_SESSION['college_full_name']);
$_SESSION['college_full_name']= $name1.', '.$location;
echo "<script>window.location.href='addCollegeGallery';</script>";
?>