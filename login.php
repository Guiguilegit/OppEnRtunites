<?php 

include("db.php");

session_start();

error_reporting(0);

if (isset($_SESSION['email'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($con, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		header("Location: profile.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form - Pure Coding</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
		<?php
			$remarks = isset($_GET['remark_login']) ? $_GET['remark_login'] : '';
			if ($remarks==null and $remarks=="") {
			   echo ' <div id="reg-head" class="headrg">Login Here</div> ';
			}
			if ($remarks=='failed') {
	           echo ' <div id="reg-head-fail" class="headrg">Login Failed!, Invalid Credentials</div> ';
			}
		?>
			<p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Login OppEnRtunites</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>