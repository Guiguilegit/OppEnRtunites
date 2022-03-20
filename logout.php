<?php 
// the session starts
session_start();
// the session is destroyed
session_destroy();
// it goes to login page
header("Location: login.php");

?>