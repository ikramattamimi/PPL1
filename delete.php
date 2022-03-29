<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

if (isset($_GET['NIM'])) {
    $nim = $_GET['NIM'];
} else {
    die("Error! NIM tidak ditemukan");
}

$sql = "SELECT * FROM mahasiswa WHERE nim = $nim";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_array($query);

unlink("foto/$result[foto]");
$sql = "delete from mahasiswa where NIM = '$nim'";
$query = mysqli_query($connection, $sql);
if ($query) {
    // echo "Delete berhasil, silahkan tekan tombol refresh atau kembali untuk melihat perubahan";
} else {
    echo "Delete gagal";
}

header("location:index.php?navigation=datasiswa");
?>
