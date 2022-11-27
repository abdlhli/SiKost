<?php
require_once "koneksi.php";
class Kamar
{

    public function get_KamarAll()
    {
        global $mysqli;
        $query = "SELECT * FROM kamar";
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get List Kamar Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function get_KamarByIdJenis($id_jenis_kamar = 0)
    {
        global $mysqli;
        $query = "SELECT * FROM kamar";
        if ($id_jenis_kamar != 0) {
            $query .= " WHERE id_jenis_kamar=" . $id_jenis_kamar;
        }
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get kamar By Id Jenis Kamar Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

}