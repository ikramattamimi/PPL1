<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Ikram = "ikram";
$sql = "SELECT * FROM `mahasiswa` ";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <table border="1" align="center" class="table">
        <tr>
            <h2>Data Mahasiswa</h2>
            <form action="datasiswafoto.php" method="POST">
                <input type="text" name="hasilInput" placeholder="Masukkan Nama">
            </form>
        </tr>
        <tr class="table-info">
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Detail</th>
            <th>Update</th>
        </tr>
        <?php
        if (isset($_POST['hasilInput'])) {
            $hasilInput = $_POST['hasilInput'];
            $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$hasilInput%'";
        } else {
            $sql = "SELECT * FROM mahasiswa";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr class="table-info">
                    <td class="table-info"> 
                        <center><?php echo $row["nim"] ?></center>
                    </td>
                    <td>
                        <center><?php echo $row["nama"] ?></center>
                    </td>
                    <td>
                        <center><?php echo $row["umur"] ?></center>
                    </td>
                    <td>
                        <a href="datasiswadetail.php? NIM=<?= $row['nim'] ?>">Detail</a>
                    </td>
                    <td>
                        <a href="datasiswaupdate.php?NIM=<?= $row['nim'] ?>">Update</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>