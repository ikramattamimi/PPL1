<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
</head>

<body>
    <h2>Tambah Data Baru</h2>
    <form action="insert.php" method="post">
        <!-- <ul> -->
        <li>
            <label>NIM</label>
            <input type="text" name="nim" class="form-control">
        </li>

        <li>
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </li>

        <li>
            <label>Umur</label>
            <input type="number" name="umur" class="form-control">
        </li>
        <li>
            <label>Foto</label>
            <input type="file" name="foto">
        </li>
        <!-- </ul> -->
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
    <br>
</body>

</html>