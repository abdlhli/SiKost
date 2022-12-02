<?php
session_start();
include 'database/config.php';

$username = $_POST['username'];
$pass = $_POST['pass'];

$login = mysqli_query($conn, "SELECT * FROM akun WHERE username='$username' AND pass='$pass'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    if ($data['hak_akses'] == "0") {
        $_SESSION['username'] = $username;
        $_SESSION['hak_akses'] = "0";
        header("location:../admin/index.html");
    } else {
        header("location:index.html");
    }

} else {
    header("location:index.html");
}