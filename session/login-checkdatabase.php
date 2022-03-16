<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $un = $_POST['un'];
    $pw = $_POST['pw'];

    $sql = "SELECT EXISTS(SELECT * FROM admin WHERE username = '$un')";
    if ($result = mysqli_query($conn, $sql)) {
        echo "Returned rows are: " . mysqli_num_rows($result);
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
