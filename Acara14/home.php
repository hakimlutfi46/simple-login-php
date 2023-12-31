<?php
require('koneksi.php');
require('query.php');
session_start();

if (!isset($_SESSION['user_name'])) {
    header('Location: index.php');
    exit();
}
$name = $_SESSION['user_name'];
$obj = new Crud;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h3>Halo, Selamat Datang
                    <?php echo $_SESSION['user_name'] ?>
                </h3>
                <a href="logout.php"><button class="btn btn-dark">Logout<i class="fa-sharp fa-solid fa-right-from-bracket ms-2"></i></button></a>
            </div>
        </div>

        <form action="home.php" method="POST">

            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-5">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col" style="max-width: 15px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $obj->lihatData();
                        $no = 1;
                        if ($data->rowCount() > 0) {
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>

                                <tr style="vertical-align: middle;">
                                    <th scope="row" class="text-center">
                                        <?= $no; ?>
                                    </th>
                                    <td>
                                        <?= $row['user_fullname']; ?>
                                    </td>
                                    <td>
                                        <?= $row['user_email']; ?>
                                    </td>
                                    <td>
                                        <?= $row['user_password']; ?>

                                    </td>
                                    <td class="text-center d-flex justify-content-center align-items-center">
                                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-warning me-2"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="hapus.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                        <?php
                                $no++;
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </form>

    </div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>