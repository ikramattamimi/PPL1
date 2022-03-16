<html>

<head>
    <title> template web </title>
</head>

<body>
    <table border=1>
        <tr>
            <th width=2000 , height=200>
                <h3 align="center"> HEADER </h3>
            </th>
        </tr>
        <tr>
            <th>
                <h3 align="left">
                    <a href="home.php "> HOME </a>
                    <a href="berita.php">&nbsp &nbsp BERITA </a>
                    <a href="datasiswafoto.php">&nbsp &nbsp DATA SISWA </a>
                </h3>
            </th>
        </tr>
        <tr height=500>
            <th align="center">
                <?php
                include 'form.php';
                include 'print.php';
                ?>
            </th>
        </tr>
        <tr>
            <th height=200>FOOTER </th>
        </tr>
    </table>

</body>

</html>