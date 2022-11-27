<?php
require_once "KamarMethod.php";
$kamar = new Kamar();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id_jenis_kamar"])) {
            $id_jenis_kamar = intval($_GET["id_jenis_kamar"]);
            $kamar->get_KamarByIdJenis($id_jenis_kamar);
        } else {
            $kamar->get_KamarAll();
        }
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

?>