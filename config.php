<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "elsneradmin";
$dbname = "Task_Registration";

$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli) {
    // echo "Database Login Success......";
}
?>