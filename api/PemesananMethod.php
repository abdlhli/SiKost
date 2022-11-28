<?php
require_once "koneksi.php";
class Pemesanan
{
    public function get_Pemesanan()
    {
        global $mysqli;
        $query = "SELECT * FROM pemesanan";
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

    public function insert_Pemesanan()
    {
        global $mysqli;
        $arrcheckpost = array(
            'id_psn' => '',
            'jenis_kamar_psn' => '',
            'no_kamar_psn' => '',
            'nama_psn' => '',
            'alamat_psn' => '',
            'no_hp_psn' => '',
            'lampiran_ktp_psn' => '',
            'tgl_psn' => '',
        );

        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query(
                $mysqli,
                "INSERT INTO pemesanan SET
                id_psn = '$_POST[id_psn]',
                jenis_kamar_psn = '$_POST[jenis_kamar_psn]',
                no_kamar_psn = '$_POST[no_kamar_psn]',
                nama_psn = '$_POST[nama_psn]',
                alamat_psn = '$_POST[alamat_psn]',
                no_hp_psn = '$_POST[no_hp_psn]',
                lampiran_ktp_psn = '$_POST[lampiran_ktp_psn]',
                tgl_psn = '$_POST[tgl_psn]'"
            );

            if ($result) {
                $response = array(
                    'Response Code' => http_response_code(),
                    'status' => 1,
                    'message' => 'Pemesanan Sukses Ditambahkan.'
                );
            } else {
                $response = array(
                    'Response Code' => http_response_code(),
                    'status' => 0,
                    'message' => 'Pemesanan Gagal Ditambahkan.'
                );
            }
        } else {
            $response = array(
                'Response Code' => http_response_code(),
                'status' => 0,
                'message' => 'Parameter Insert Tidak Sama'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}