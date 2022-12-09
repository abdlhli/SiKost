<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "sikost";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("ERROR: Tidak Dapat Terkoneksi. " . mysqli_connect_error());
}

?>