<?php
require('koneksi.php');
require('query.php');

$id = $_GET['id'];
$crud = new Crud();

if (isset($_POST['update'])) {
    // Proses update data ke database di sini
    $id = $_POST['txt_id'];
    $nama = $_POST['txt_nama'];
    $email = $_POST['txt_email'];
    $pass = $_POST['txt_pass'];


    if ($crud->editData($id, $email, $pass, $nama)) {
        echo '<div class="alert alert-success">Data berhasil diupdate</div>';
        header('Location: home.php');
    } else {
        echo '<div class="alert alert-danger">Data gagal diupdate</div>';
    }
}


$data = $crud->getDataByID($id);
if ($data) {
    $userMail = $data['user_email'];
    $userName = $data['user_fullname'];
    $userPass = $data['user_password'];
} else {
    echo '<div class="alert alert-danger">Data tidak ditemukan.</div>';
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card p-4" style="width:60%">
            <form action="edit.php" method="post">
                <h1>Edit Data</h1>
                <input type="hidden" name="txt_id" value="<?php echo $id; ?>">
                <div class="form-floating mb-3">
                    <input name="txt_email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $userMail; ?>">
                    <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="txt_pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" value="<?php echo $userPass; ?>">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="txt_nama" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $userName; ?>">
                    <label for="floatingInput">Nama</label>
                </div>
                <a href="home.php" class="btn btn-danger me-1">Kembali</a>
                <button type="submit" name="update" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</body>

</html>