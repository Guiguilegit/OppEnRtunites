<?php
// datase linked to the logged user
include('db.php');
// initialization of the logged user's session
session_start();
// initialization of the variables 
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($con,"SELECT email,id FROM users WHERE email='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['email'];
$loggedin_id=$row['id'];
//return to the profile page when email isn't set or is equal to NULL
if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
  header("Location: profile.php");
}
?>