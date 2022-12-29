<?php
require_once "koneksi.php";
class Pengaduan
{
    public function get_Pengaduan()
    {
        global $mysqli;
        $query = "SELECT * FROM pengaduan";
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'Response Code' => http_response_code(),
            'status' => 1,
            'message' => 'Get List Pengaduan Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function insert_Pengaduan()
    {
        global $mysqli;
        $nama_pgd = $_POST['nama_pgd'];
        $nokam_pgd = $_POST['no_kamar_pgd'];
        $isi_pgd = $_POST['isi_pgd'];
        $judul_pgd = $_POST['judul_pgd'];

        $sumber = $_FILES['lampiran_pgd']['tmp_name'];
        $nama_gambar = $_FILES['lampiran_pgd']['name'];

        $result = mysqli_query(
            $mysqli,
            "INSERT INTO `pengaduan`(`nama_pgd`, `no_kamar_pgd`, `isi_pgd`, `lampiran_pgd`, `judul_pgd`) 
            VALUES ('$nama_pgd','$nokam_pgd','$isi_pgd','$nama_gambar','$judul_pgd')"
        );

        if (!move_uploaded_file($sumber, '../file/pengaduan/' . $nama_gambar)) {
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
                    'message' => 'Pengaduan Sukses Ditambahkan.'
                );
            } else {
                $response = array(
                    'Response Code' => http_response_code(),
                    'status' => 0,
                    'message' => 'Pengaduan Gagal Ditambahkan.'
                );
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
