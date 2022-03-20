<?php 
// initialization of the variables of the database 
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "database";
$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

// error message for database connection 
if(!$con) {
    die("<scripts>alert('Connection Failed.')</scripts>");
}
?>