<?php 
// link with the database
include("db.php");

// session starts 
session_start();

// no error report
error_reporting(0);

// go to login page when email is set
if (isset($_SESSION['email'])) {
    header("Location: login.php");
}
// if data is submitted...
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($con, $sql);

	// if there is a common result for one or two rows, put the results data in the users table 
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		// go to profile page
		header("Location: profile.php");
	} else {
		// error message 
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>