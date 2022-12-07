<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "sikost";

$conn = mysqli_connect($server, $user, $pass, $database);

if ($conn->connect_error) {
    die("Gagal Tersambung Ke Database");
}
?>