<?php
include_once ('dbconnect.php'); 
unset($_SESSION['college_name']); 
unset($_SESSION['college_Full_name']); 
echo "<script>window.location.href='College-View';</script>";
?>