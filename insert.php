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
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $foto = $_POST['foto'];
    $sql = "INSERT INTO mahasiswa (nim,nama,umur,foto)
     VALUES ('$nim','$nama','$umur', '$foto')";
    if (mysqli_query($conn, $sql)) {
        // echo "New record has been added successfully !";
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<?php
include 'datasiswafoto.php';
?>

