<?php
require_once "koneksi.php";
class Pembayaran
{
    public function get_Pembayaran()
    {
        global $mysqli;
        $query = "SELECT * FROM `pembayaran` JOIN akun ON pembayaran.id_user = akun.id_user";
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'Response Code' => http_response_code(),
            'status' => 1,
            'message' => 'Get List Pemesanan Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function get_PembayaranByIdUser($id_user)
    {
        global $mysqli;
        $query = "SELECT * FROM `pembayaran` JOIN akun ON pembayaran.id_user = akun.id_user WHERE akun.id_user = $id_user";
        $data = array();

        $result = $mysqli->query($query);

        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'Response Code' => http_response_code(),
            'status' => 1,
            'message' => 'Get Pembayaran By Id User Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function get_PembayaranByIdpembayaran($id_pembayaran)
    {
        global $mysqli;
        $query = "SELECT * FROM `pembayaran` JOIN akun ON pembayaran.id_user = akun.id_user WHERE pembayaran.id_pembayaran = $id_pembayaran";
        $data = array();

        $result = $mysqli->query($query);

        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'Response Code' => http_response_code(),
            'status' => 1,
            'message' => 'Get Pembayaran By Id User Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
