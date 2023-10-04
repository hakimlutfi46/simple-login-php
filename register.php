<?php
require('koneksi.php');

if (isset($_POST['register'])) {
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_name'];

    $query = "INSERT INTO user_detail VALUES ('', '$userMail', '$userPass', '$userName', '2')";
    $result = mysqli_query($koneksi, $query);
    header('Location: login.php');
}
?>

<html>

<head>
    <title>Resister</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <form action="register.php" method="POST">

        <p>
            <i class="fa fa-angle-left" style="font-size:21px;color:#007bff"></i>
            <a href="login.php">Login</a>
        </p>
        <h2>Register</h2>
        <input type="text" name="txt_email" required placeholder="Masukkan Email">
        <input type="password" name="txt_pass" required placeholder="Masukkan Password">
        <input type="text" name="txt_nama" required placeholder="Masukkan Nama">
        <button type="submit" name="register">Register</button>
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
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-bottom: 2rem;
    }

    p {
        margin: 10px 0;
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
        cursor: pointer;
        transition: 0.3s;
        width: 100%;
        margin-bottom: 18px;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }
</style>