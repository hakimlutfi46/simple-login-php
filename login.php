<?php
require('koneksi.php');
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];

    // validasi user dan password dari database
    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query = "SELECT * FROM user_detail WHERE user_email = '$email' ";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];
            $level = $row['level'];
        }

        if ($num != 0) {
            if ($userVal == $email && $passVal == $pass) {
                header('Location: home.php');
                exit;
            } else {
                $error = 'User atau password salah !';
                header('Location: login.php');
            }
        } else {
            $error = 'User tidak ditemukan !';
            header('Location: login.php');
        }
    } else {
        $error = 'Data tidak boleh kosong !';
        echo $error;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <form action="login.php" method="post">
            <h2 style="margin-bottom: 1rem">Login</h2>
            <div class="form-floating mb-3">
                <input name="txt_email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating">
                <input name="txt_pass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button name="submit" type="submit" class="btn btn-primary ms-auto mt-3" style="width:100%">Submit</button>

            <p>Tidak punya akun? Silahkan <a href="register.php">Daftar</a></p>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<style>
    form {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    p,
    a {
        margin-top: 10px;
        text-decoration: none;
    }
</style>