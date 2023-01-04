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
        $jenis_psn = $_POST['jenis_kamar_psn'];
        $nokam_psn = $_POST['no_kamar_psn'];
        $nama_psn = $_POST['nama_psn'];
        $alamat_psn = $_POST['alamat_psn'];
        $nohp_psn = $_POST['no_hp_psn'];

        $sumber = $_FILES['lampiran_ktp_psn']['tmp_name'];
        $nama_gambar = $_FILES['lampiran_ktp_psn']['name'];

        $result = mysqli_query(
            $mysqli,
            "INSERT INTO `pemesanan`(`jenis_kamar_psn`, `no_kamar_psn`, `nama_psn`, `alamat_psn`, `no_hp_psn`, `lampiran_ktp_psn`, tgl_psn) 
            VALUES ('$jenis_psn','$nokam_psn','$nama_psn','$alamat_psn','$nohp_psn','$nama_gambar',now())"
        );

        if (!move_uploaded_file($sumber, '../file/pemesanan/' . $nama_gambar)) {
            $response = array(
                'Response Code' => http_response_code(),
                'status' => 0,
                'message' => 'File gagal diupload ke server.'
            );

            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
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

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
