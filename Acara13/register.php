<?php
require('koneksi.php');

$errors = []; // Membuat array untuk menampung pesan kesalahan
if (isset($_POST['register'])) {
    $userMail = $_POST['txt_email'];
    $userPass = $_POST['txt_pass'];
    $userName = $_POST['txt_name'];

    // Validasi apakah data kosong
    if (empty($userMail) || empty($userPass) || empty($userName)) {
        $errors[] = "Semua data harus diisi"; // Menambahkan pesan kesalahan ke dalam array
    }

    if (empty($errors)) {
        // Jika tidak ada kesalahan, lakukan penambahan data ke database
        $query = "INSERT INTO user_detail VALUES ('', '$userMail', '$userPass', '$userName', '2')";
        $result = mysqli_query($koneksi, $query);
        header('Location: login.php');
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-md p-4 mx-auto" style="width:60%">
            <form action="register.php" method="POST">
                <h1 class="mb-3">Register</h1>

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
                    <input name="txt_email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="txt_pass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="txt_name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Nama</label>
                </div>
                <a href="login.php" class="btn btn-dark me-1">Kembali</a>
                <button type="submit" name="register" class="btn btn-primary">Register</button>
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