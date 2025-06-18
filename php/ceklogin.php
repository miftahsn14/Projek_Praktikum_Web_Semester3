<?php
session_start();

include "../php/koneksi.php"; // Menyambungkan koneksi ke db


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT password FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Cek apakah password udah di hash atau belum 
        if (strlen($stored_password) == 60) {
            // klo pass udh di hash, di verif
            if (password_verify($password, $stored_password)) {
                $_SESSION['username'] = $username;
                header("location:../dashboard.php");
            } else {
                header("location:../login.php?pesan=gagal");
            }
        } else {
            // klo belum di hash, gunakan pengecekan biasa
            if ($password === $stored_password) {
                // meng hash password yang dimasukkin langsung ke database, klo masukkin pass langsung ke db ga di hash, pas login gagal
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE user SET password = '$hashed_password' WHERE username = '$username'";
                $conn->query($update_sql);

                $_SESSION['username'] = $username;
                header("location:../dashboard.php");
            } else {
                header("location:../login.php?pesan=gagal");
            }
        }
    } else {
        header("location:../login.php?pesan=gagal");
    }
}

$conn->close();
?>
