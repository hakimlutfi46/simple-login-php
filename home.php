<?php
require('koneksi.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container pt-5">
        <h1>Selamat datang</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php
            $query = "SELECT * FROM  user_detail";
            $result = mysqli_query($koneksi, $query);
            $no = 1;

            while ($row = mysqli_fetch_array($result)) {
                $userMail = $row['user_email'];
                $userName = $row['user_fullname'];

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $userMail ?></td>
                        <td><?php echo $userName ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                $no++;
            }   ?>
                </tbody>
        </table>
    </div>
</body>

</html>