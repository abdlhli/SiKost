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
            'message' => 'Get List Pemesanan Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function insert_Pengaduan()
    {
        global $mysqli;
        $arrcheckpost = array(
            'id_pgd' => '',
            'nama_pgd' => '',
            'no_kamar_pgd' => '',
            'isi_pgd' => '',
            'lampiran_pgd' => '',
            'judul_pgd' => '',
        );

        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query(
                $mysqli,
                "INSERT INTO pengaduan SET
                id_pgd = '$_POST[id_pgd]',
                nama_pgd = '$_POST[nama_pgd]',
                no_kamar_pgd = '$_POST[no_kamar_pgd]',
                isi_pgd = '$_POST[isi_pgd]',
                lampiran_pgd = '$_POST[lampiran_pgd]',
                judul_pgd = '$_POST[judul_pgd]'"
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