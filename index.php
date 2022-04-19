<html>

<head>
    <title> template web </title>
    <style>
        .navigation-link {
            text-decoration: none;
        }

        table {
            border-collapse: collapse;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['status'] != "berhasil_login") {
        header("location:loginform.php?pesan=belum_login");
    }
    ?>

    <table border=1>
        <tr>
            <th width=2000 , height=200>
                <h3 align="center"> HEADER </h3>
            </th>
        </tr>
        <tr>
            <th class="navigation-container">
                <h3 align="center">
                    <a href="?navigation=home" class="navigation-link"> HOME </a>
                    <a href="?navigation=berita" class="navigation-link">&nbsp &nbsp BERITA </a>
                    <a href="?navigation=datasiswa" class="navigation-link">&nbsp &nbsp DATA SISWA </a>
                    <a href="logout.php" class="navigation-link">&nbsp &nbsp LOGOUT </a>
                    <a href="pdf.php" class="navigation-link">&nbsp &nbsp PDF </a>
                </h3>
            </th>
        </tr>
        <tr height=500>
            <th align="center">
                <?php
                include "navigation.php";
                ?>
            </th>
        </tr>
        <tr>
            <th align="center" height=200>
                <h3 align="center">FOOTER </h3>
            </th>
        </tr>
    </table>

</body>

</html>