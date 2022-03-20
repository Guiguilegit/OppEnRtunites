<?php 
// session starts
session_start();

include('db.php');
// initialization of the variables 
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
 // You have successed when data are been inserted
 if(mysqli_query($con,"INSERT INTO users(firstname, lastname, email,password)VALUES('$firstname', '$lastname','$email','$password')")){ 
 header("location: login.php?remarks=success");
 }else{
 // error
  $e=mysqli_error($con);
 header("location: login.php?remarks=error&value=$e");  
 }
}
?>