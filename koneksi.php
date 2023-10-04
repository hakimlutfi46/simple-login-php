<?php
$server = "localhost";
$username = "root ";
$password = "";
$db = "user";

if (mysqli_connect_errno()) {
    echo "Koneksi Gagal : " . mysqli_connect_errno();
}
