<?php
class Crud extends koneksi
{
    public function lihatData()
    {
        $sql = "SELECT * FROM user_detail";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }


    public function loginCheck($email, $password)
    {
        $query = "SELECT * FROM user_detail WHERE user_email = :email";
        $result = $this->koneksi->prepare($query);
        $result->bindParam(':email', $email);
        $result->execute();
        $num = $result->rowCount();

        if ($num != 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $emailVal = $row['user_email'];
            $passwordVal = $row['user_password'];

            if ($email == $emailVal && $password == $passwordVal) {
                // Simpan informasi pengguna dalam sesi
                $_SESSION['user_name'] = $row['user_fullname'];
                $_SESSION['login_success'] = true;
            } else {
                return "User atau Password Salah";
            }
        } else {
            return "User tidak ditemukan!";
        }
    }


    public function hapusData()
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM user_detail WHERE id = '$id'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        header('Location: home.php');
        return $result;
    }

    public function getDataByID($id)
    {
        $sql = "SELECT * FROM user_detail WHERE id = :id";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function editData($id, $email, $pass, $name)
    {
        try {
            $sql = "UPDATE user_detail SET user_email = :email, user_password = :pass, user_fullname = :name where id = :id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $id);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insertData($email, $pass, $name)
    {
        try {
            $sql = "INSERT into user_detail values (null, :email, :pass, :name, 2)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
