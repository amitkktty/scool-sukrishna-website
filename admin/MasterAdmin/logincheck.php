<?php
include_once('dbconnect.php');
$adm_name = $_SESSION['adm_name'];
$adm_pass = $_SESSION['adm_pass'];
if (isset($_SESSION['adm_name']) and isset($_SESSION['adm_pass'])) {

	$sql = "select count(*) as total from login_data where uname='$adm_name' AND upass='$adm_pass' AND status='Active'";
	if (!mysqli_query($conn, $sql)) {
		$message = "Error description:  " . $sql . "<br>" . mysqli_error($conn);
		echo "<h3 class='text-warning bg-danger'>$message </h3>";
		exit();
	} else {
		$query = mysqli_query($conn, $sql);
		$result = mysqli_fetch_object($query);
		$total = $result->total;
		if ($total <> 1) {
			session_destroy();
			echo "<form action= ../index method=post name=main></form>
			 <script>document.main.submit(); </script>";
		}
	}
} else {
	session_destroy();
	echo "<form action=../index method=post name=main></form>
	<script>document.main.submit(); </script>";
}
?>