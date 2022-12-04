<?php
require_once "PengaduanMethod.php";
$pengaduan = new Pengaduan();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        $pengaduan->get_Pengaduan();
        break;

    case 'POST':
        $pengaduan->insert_Pengaduan();
        break;

    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

?>