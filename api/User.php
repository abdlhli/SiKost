<?php
require_once "UserMethod.php";
$user = new User();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id_user"])) {
            $id_user = intval($_GET["id_user"]);
            $user->get_UserById($id_user);
        } else {
            $user->get_UserAll();
        }
        break;

    case 'POST':
        if (!empty($_GET["id_user"])) {
            $id_user = intval($_GET["id_user"]);
            $user->update_User($id_user);
        } else {
            $user->insert_User();
        }
        break;

    case 'DELETE':
        $id_user = intval($_GET["id_user"]);
        $user->delete_User($id_user);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

?>