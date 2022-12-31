<?php
require_once "PembayaranMethod.php";
$Detpembayar = new Pembayaran();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        $id_pembayaran = intval($_GET["id_pembayaran"]);
        $Detpembayar->get_PembayaranByIdpembayaran($id_pembayaran);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
