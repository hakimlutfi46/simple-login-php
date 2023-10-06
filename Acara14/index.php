<?php
require('koneksi.php');
require('query.php');
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "db_user");

if (isset($_SESSION['login_success'])) {
    header('Location: home.php');
    exit();
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $crud = new Crud();
    $error = $crud->loginCheck($email, $password);

    if (empty($error)) {
        // Redirect ke halaman home jika login berhasil
        $_SESSION['login_success'] = true;
        header('Location: home.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card " style="width: 23rem;">
            <div class="card-body">
                <h1 class=" text-center mb-5">Login Form</h1>
                <form action="index.php" method="POST">
                    <div class="row mb-4">
                        <div class="col-12 mb-2">
                            <label for="">Email</label>
                            <input name="email" type="email" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="">Password</label>
                            <input name="password" type="password" class="form-control" required>
                        </div>
                    </div>
                    <?php
                    if (isset($error)) {
                        echo "<div class='alert alert-danger' role='alert'>
                        $error
                      </div>";
                    }
                    ?>
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 21rem;">Login</button>
                    <h5 class="mt-2 register-link">Belum punya akun? <a href="register.php" style="text-decoration: none">Daftar disini</a></h5>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>