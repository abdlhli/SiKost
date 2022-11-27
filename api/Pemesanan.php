<?php
require_once "PemesananMethod.php";
$pemesanan = new Pemesanan();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        $pemesanan->get_Pemesanan();
        break;

    case 'POST':
        $pemesanan->insert_Pemesanan();
        break;

    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

?>