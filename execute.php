<?php 
session_start();
include('db.php');
$email=$_POST['email'];
$result = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
$num_rows = mysqli_num_rows($result);
if ($num_rows) {
 header("location: login.php?remarks=failed"); 
}else {
 $firstname=$_POST['firstname'];
 $lastname=$_POST['lastname'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 if(mysqli_query($con,"INSERT INTO users(firstname, lastname, email,password)VALUES('$firstname', '$lastname','$email','$password')")){ 
 header("location: login.php?remarks=success");
 }else{
  $e=mysqli_error($con);
 header("location: login.php?remarks=error&value=$e");  
 }
}
?>