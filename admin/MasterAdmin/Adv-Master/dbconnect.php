<?php
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$currentdt= date('d-m-Y h:i:sa');

$servername="localhost";
$username="crystalmind_demouser";
$password="ECHz-[1xQQc-";
$db_name="crystalmind_sukrishnademo";
$conn = new mysqli($servername,$username,$password,$db_name);
// Check connection
if (!$conn) {
  echo "<br><br><font color=red size=+2 align=center>Database not connected successfully. Please Contact Service Provider/Web Developer Team </font>";// . $conn -> connect_error;
  exit();
}
/* foreach($_REQUEST as $var => $val)
$$var = trim(strip_tags($val)); */
foreach($_REQUEST as $var => $val)
$$var = $val;



// --------------- login Check ------------
$adm_name=$_SESSION['adm_name'];
$adm_pass=$_SESSION['adm_pass'];  
if (isset($_SESSION['adm_name']) AND isset($_SESSION['adm_pass'])) 
{
	
	$sql="select count(*) as total from login_data where uname='$adm_name' AND upass='$adm_pass' AND status='Active'";
	if (!mysqli_query($conn , $sql)) 
	{
		$message = "Error description:  " . $sql. "<br>" . mysqli_error($conn);
		echo "<h3 class='text-warning bg-danger'>$message </h3>";
		exit();
	}	
	else
	{	
		$query=mysqli_query($conn, $sql);
		$result=mysqli_fetch_object($query);
		$total=$result->total;
		if($total <> 1 )
		{  
	       session_destroy();
		   echo "<form action=../../index.php method=post name=main></form>
			 <script>document.main.submit(); </script>"; 
		}
	}		
}
else
{ 
   session_destroy();
   echo "<form action=../../index.php method=post name=main></form>
	<script>document.main.submit(); </script>";  
}
?>