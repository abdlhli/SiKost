<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "sikostan";

$conn = mysqli_connect($server, $user, $pass, $database);

if ($conn->connect_error) {
    die("ERROR: Tidak Dapat Terkoneksi. " . mysqli_connect_error());
}
