<?php
$server = "localhost";
$username = "root";
$password = "husna";
$database_name = "finally_project";
$conn = mysqli_connect($server, $username, $password, $database_name);
if ($conn->connect_errno) {
    die("Connection failed: " . mysqli_connect_error($conn));
} else {
    echo "Connection successful";
}
?>
