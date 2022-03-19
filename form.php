<!DOCTYPE html>
<html>
<body>

<?php 

  //checking if data has been entered
    if( isset( $_POST['fname'] ) && !empty( $_POST['fname'] ) && isset( $_POST['lname'] ) && !empty( $_POST['lname'] ) && isset( $_POST['pro_pic'] ) && !empty( $_POST['pro_pic'] ) && isset( $_POST['pw'] ) && !empty( $_POST['pw'] ) && isset( $_POST['geolocation'] ) && !empty( $_POST['geolocation'] ) )
    {
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $profile_picture = $_POST["pro_pic"];
    $password = $_POST["pw"];
    $geolocation = $_POST["geolocation"];
    } 
    else 
    {
        header( 'location: form.html' );
        exit();
    }

    //setting up mysql details
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'oppenrtunites';

    //connecting to sql database
    $db_conn = mysql_connect($db_host,$db_user,$db_password);
  if ($db_conn)
  {echo "connect to".db_host."server with the username".db_user."<br/>";}
else
{
  die("couldn't connect to mysql".mysqli_connect_error());
}
  if(mysqli_select_db($db_conn,$db_db))
{echo "connect to database".$db_db;}
else
{
  die("no database");
}

    //inserting details into table
    $insert = $db_conn->query( "INSERT INTO user ( 'first_name','last_name','picture','password','geolocation' ) VALUES ( '$first_name','$last_name','$pro_pic','$pw','$geolocation' )" );

    //closing mysqli connection
    $db_conn->close();
        
        //we send the user in the 
        header("Location:index.php");

?>

</body>
</html>