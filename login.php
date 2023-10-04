<?php
require('koneksi.php');

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_password'];

    if (!empty(trim($email)) && !empty(trim($pass))) {
        $query = "SELECT * FROM user_detail WHERE user_email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        if ($num != 0) {
            $row = mysqli_fetch_array($result);

            $id = $row['id'];
            $userVal = $row['user_email'];
            $passVal = $row['user_password'];
            $userName = $row['user_fullname'];
            $level = $row['id_level'];

            // Periksa email dan kata sandi dengan fungsi password_verify
            if ($userVal == $email && password_verify($pass, $passVal)) {
                header('Location: home.php');
            } else {
                $error = 'Email atau kata sandi salah!!';
                header('Location: login.php');
            }
        } else {
            $error = 'User tidak ditemukan!!';
            header('Location: login.php');
        }
    } else {
        $error = 'Data tidak boleh kosong !!';
        echo $error;
    }
}
?>

<html>

<head>
    <title>Login page</title>
</head>

<body>
    <form action="login.php" method="POST">
        <h2>Login</h2>

        <input type="text" name="txt_email" placeholder="Masukkan Email">
        <input type="password" name="txt_pass" placeholder="Masukkan Passowrd">

        <button type="submit" name="submit">Sign in</button>

        <p>Tidak punya akun? silahkan <a href="register.php">Daftar</p>
    </form>
</body>

</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        max-width: 300px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);

    }

    p {
        font-size: 13px;
        margin: 10px 0;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        transition: 0.3s;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>