<?php 
// session starts
session_start();
// go to homepage when username isn't set
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <!-- welcome message for the user -->
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <!-- go to logout page -->
    <a href="logout.php">Logout</a>
</body>
</html>