<?php
require('koneksi.php');
session_start();

$errors = []; // Membuat array untuk menampung pesan kesalahan

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
                echo "<script>alert('$error');</script>";
                header('Location: login.php');
            }
        } else {
            echo "<script>alert('$error');</script>";
            header('Location: login.php');
        }
    } else {
        $error = 'Data tidak boleh kosong !';
        $errors[] = "Semua data harus diisi";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-md p-4 mx-auto" style="width: 60%">
            <form action="login.php" method="post">
                <h1 class="mb-3" </h2>Login</h1>
                <!-- Menampilkan pesan kesalahan jika ada -->
                <?php if (!empty($errors)) { ?>
                    <div id="liveAlertPlaceholder">
                        <?php foreach ($errors as $error) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="form-floating mb-3">
                    <input for="validationCustom01"" name=" txt_email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input name="txt_pass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <button name="submit" type="submit" class="btn btn-primary ms-auto mt-3" style="width:100%">Submit</button>
                <div class="mt-2">
                    <p>Tidak punya akun? Silahkan <a href="register.php" style="text-decoration: none">Daftar</a></p>
                </div>

            </form>
        </div>
    </div>
</body>

</html>

<script>
    document.getElementById("liveAlertBtn").addEventListener("click", function() {
        var alertPlaceholder = document.getElementById("liveAlertPlaceholder");
        var wrapper = document.createElement("div");
        wrapper.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Semua data harus diisi<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        alertPlaceholder.append(wrapper);
    });
</script>