<?php
require('koneksi.php');
require('query.php');

$obj = new Crud;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if ($obj->insertData($email, $pass, $nama)) {
        echo '<div class="alert alert-success">Data berhasil disimpan</div>';
    } else {
        echo '<div class="alert alert-danger">Data gagal disimpan</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card " style="width: 23rem;">
            <div class="card-body">
                <h1 class=" text-center mt-2 mb-5">Register</h1>
                <form action="#" method="POST">
                    <div class="row mb-4">
                        <div class="col-12 mb-2">
                            <label for="nama">Nama</label>
                            <input id="nama" type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="pass" class="form-control" required>
                        </div>
                    </div>
                    <?php
                    if (isset($error)) {
                        echo "<div class='alert alert-danger' role='alert'>
                        $error
                      </div>";
                    }
                    ?>
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 21rem;">Register</button>
                    <h5 class="mt-2 login-link">Sudah punya akun? <a href="index.php" style="text-decoration: none;">Masuk disini</a></h5>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>