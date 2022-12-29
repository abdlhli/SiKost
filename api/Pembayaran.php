<?php
require_once "PembayaranMethod.php";
$kamar = new Pembayaran();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id_user"])) {
            $id_user = intval($_GET["id_user"]);
            $kamar->get_PembayaranByIdUser($id_user);
        } else {
            $kamar->get_Pembayaran();
        }
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
