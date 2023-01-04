<?php
require_once "PembayaranMethod.php";
$pembayar = new Pembayaran();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        $id_user = intval($_GET["id_user"]);
        $pembayar->get_PembayaranBelumLunasByIdUser($id_user);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
