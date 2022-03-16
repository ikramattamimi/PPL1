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

    <style>
        table,
        th,
        td, tr {
            border: 1px solid #B0C4DE;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            align-self: center;
        }

        table.table-striped{
            width: 50%;
            /* border: 1px solid grey; */
        }

        table.table-striped tbody tr:nth-child(odd) {
            background-color: #CDF0EA;
        }

        table.table-striped tbody tr:nth-child(even) {
            background-color: white;
        }

        input {
            border: 1px solid #B0C4DE;
        }

        a.a1{
            text-decoration: none;
            color: black;
        }

        button.button1 {
            background-color: #C1DEAE;
            border: 0px solid;
        }

        button.button2 {
            background-color: #219F94;
            border: 0px solid;
        }
        
    </style>
</head>


<body>
    <table class="table table-striped">
        <tr>
            <br/>
            <p align='center' >
            <form action="datasiswafoto.php" method="POST">
                <input type="text" name="hasilInput" placeholder="Masukkan Nama">
            </form>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href="datasiswaform.php">Insert</a>
        </tr>
        <tr align="center">
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Foto</th>
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
                <tr>
                    <td>
                        <center><?php echo $row["nim"] ?></center>
                    </td>
                    <td>
                        <center><?php echo $row["nama"] ?></center>
                    </td>
                    <td>
                        <center><?php echo $row["umur"] ?></center>
                    </td>
                    <td>
                        <?php echo "<img src='../foto/$row[foto]' width='70' height='70' />"; ?></td>
                    </td>
                    <td>
                        <button class="button1">
                        <a class = a1 href="datasiswadetail.php?NIM=<?= $row['nim'] ?>">Detail</a>
                        </button>
                    </td>
                    <td>
                        <button class="button2">
                        <a class = a1 href="datasiswaupdate.php?NIM=<?= $row['nim'] ?>">Update</a>
                        </button>
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