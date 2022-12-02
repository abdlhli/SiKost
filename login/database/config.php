<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "sikost";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    echo ("Gagal Tersambung Ke Database");
}

?>