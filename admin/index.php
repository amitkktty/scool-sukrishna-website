<?php
include_once "dbconnect.php";
unset($_SESSION['adm_name']);
unset($_SESSION['adm_pass']);
if (isset($_POST['submit'])) {
	$errors = array();
	if (empty($adm_name))
		$errors[login_err] = "<span class='text-danger'>Username Empty</span>";
	else {
		if (empty($adm_pass))
			$errors[login_err] = "<span class='text-danger'>Password Empty</span>";
	}
	if (empty($errors)) {
		$adm_name = mysqli_real_escape_string($conn, $adm_name);
		$adm_pass = mysqli_real_escape_string($conn, $adm_pass);

		$q1 = "select count(*) as total from login_data where uname='$adm_name' AND upass='$adm_pass' AND status='Active'";
		if (!mysqli_query($conn, $q1)) {
			$errors[login_err] = "Error description:  " . $q1 . "<br>" . mysqli_error($conn);
		} else {
			$qr = mysqli_query($conn, $q1);
			$r = mysqli_fetch_object($qr);
			$total = $r->total;
			if ($total == 1) {
				$_SESSION['adm_name'] = $adm_name;
				$_SESSION['adm_pass'] = $adm_pass;
				echo "<form action=MasterAdmin/ method=post name=main></form>
		  <script>document.main.submit(); </script>";
			} else {
				$errors[login_err] = "<span class='text-danger'>Wrong username or password</span>";
			}
		}
	}
}
?>






<html lang="en">

<head>
	<title>Sukrishna :: Home</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keyword" content="">
	<?php include_once('include/head.php'); ?>
</head>
<style type="text/css">
	body {
		background: #2A3F54
	}

	.card {
		border: none;
		height: 420px
	}

	.forms-inputs {
		position: relative
	}

	.forms-inputs span {
		position: absolute;
		top: -18px;
		left: 10px;
		background-color: #fff;
		padding: 5px 10px;
		font-size: 15px
	}

	.forms-inputs input {
		height: 50px;
		border: 2px solid #eee
	}

	.forms-inputs input:focus {
		box-shadow: none;
		outline: none;
		border: 2px solid #000
	}

	.btn {
		height: 50px
	}

	.success-data {
		display: flex;
		flex-direction: column
	}

	.bxs-badge-check {
		font-size: 90px
	}
</style>

<body>
	<div class="container mt-5"><br><br>
		<div class="row d-flex justify-content-center">
			<div class="col-md-6">
				<div class="card px-5 py-5 text-center" id="form1"><a href='index'>
						<img src="../images/offlicial__logos.png" style="width:70%;" class='img-fluid' /></a><br>
					<p>&nbsp;</p>

					<form action="index.php" method='post'>
						<div class="form-data">
							<div class="forms-inputs mb-4"> <span>Username</span> <input autocomplete="off" type="text"
									class=' pl-3' name='adm_name'>
							</div>
							<div class="forms-inputs mb-4"> <span>Password</span> <input autocomplete="off"
									type="password" class=' pl-3' name='adm_pass'>
							</div>
							<div class="mb-3"> <button class="btn btn-dark w-100" name='submit'>Login</button> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>