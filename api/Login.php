<?php
require_once "UserMethod.php";
$login = new User();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'POST':
        $login->login_user();
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}
