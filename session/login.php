<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Silahkan Login Terlebih Dahulu</h2>
    <form action="login-checkdatabase.php" method="post">
        <!-- <ul> -->
        <li>
            <label>Username</label>
            <input type="text" name="un" class="form-control">
        </li>

        <li>
            <label>Password</label>
            <input type="text" name="pw" class="form-control">
        </li>

        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
    <br>
</body>

</html>