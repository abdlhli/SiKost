<?php
require_once "koneksi.php";
class User
{

    public function get_UserAll()
    {
        global $mysqli;
        $query = "SELECT * FROM Akun";
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get List Akun Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function get_UserById($id_user = 0)
    {
        global $mysqli;
        $query = "SELECT * FROM akun";
        if ($id_user != 0) {
            $query .= " WHERE id_user=" . $id_user . " LIMIT 1";
        }
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get Akun By ID Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function insert_User()
    {
        global $mysqli;
        $arrcheckpost = array(
            'id_user' => '',
            'firstname' => '',
            'lastname' => '',
            'pass' => '',
            'username' => '',
            'no_hp' => '',
            'alamat' => '',
            'tgl_lahir' => '',
            'foto_profile' => '',
            'asal_kampus' => '',
            'hak_akses' => '',

        );
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {

            $result = mysqli_query(
                $mysqli,
                "INSERT INTO akun SET
                id_user = '$_POST[id_user]',
                firstname = '$_POST[firstname]',
                lastname = '$_POST[lastname]',
                pass = '$_POST[pass]',
                username = '$_POST[username]',
                no_hp = '$_POST[no_hp]',
                alamat = '$_POST[alamat]',
                tgl_lahir = '$_POST[tgl_lahir]',
                foto_profile = '$_POST[foto_profile]',
                asal_kampus = '$_POST[asal_kampus]',
                hak_akses = '$_POST[hak_akses]'
                "
            );

            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Akun Sukses Ditambahkan.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Akun Gagal Ditambahkan.'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter Insert Tidak Sama'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update_User($id_user)
    {
        global $mysqli;
        $arrcheckpost = array(
            'id_user' => '',
            'firstname' => '',
            'lastname' => '',
            'pass' => '',
            'username' => '',
            'no_hp' => '',
            'alamat' => '',
            'tgl_lahir' => '',
            'foto_profile' => '',
            'asal_kampus' => '',
            'hak_akses' => ''

        );
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {

            $result = mysqli_query($mysqli, "UPDATE akun SET
                id_user = '$_POST[id_user]',
                firstname = '$_POST[firstname]',
                lastname = '$_POST[lastname]',
                pass = '$_POST[pass]',
                username = '$_POST[username]',
                no_hp = '$_POST[no_hp]',
                alamat = '$_POST[alamat]',
                tgl_lahir = '$_POST[tgl_lahir]',
                foto_profile = '$_POST[foto_profile]',
                asal_kampus = '$_POST[asal_kampus]',
                hak_akses = '$_POST[hak_akses]'
                WHERE id_user='$id_user'
                ");

            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Mahasiswa Added Successfully.'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Mahasiswa Addition Failed.'
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Parameter Update Tidak Sama'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function delete_User($id_user)
    {
        global $mysqli;
        $query = "DELETE FROM akun WHERE id_user=" . $id_user;
        if (mysqli_query($mysqli, $query)) {
            $response = array(
                'status' => 1,
                'message' => 'Akun Berhasil Terhapus.'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Akun Gagal Terhapus.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}