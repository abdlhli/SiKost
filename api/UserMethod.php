<?php
require_once "koneksi.php";
class User
{

    public function get_UserAll()
    {
        global $mysqli;
        $query = "SELECT * FROM akun WHERE `hak_akses` = 1 AND `status` = 'Aktif'";
        $data = array();
        $result = $mysqli->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'Response Code' => http_response_code(),
            'status' => 1,
            'message' => 'Get List Akun Sukses.',
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function login_user()
    {
        global $mysqli;
        $username = $_POST['username'];
        $pass = md5($_POST['pass']);

        $sql = "SELECT * FROM akun WHERE username='$username' AND pass='$pass' AND hak_akses = 1 AND status = 'Aktif'";
        $result = mysqli_query($mysqli, $sql);
        $data = array();
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        // Memeriksa hasil perintah SQL
        if (mysqli_num_rows($result) > 0) {
            $response = array(
                'Response Code' => http_response_code(),
                'status' => 1,
                'message' => 'Login Berhasil.',
                'data' => $data
            );
        } else {
            $query = "SELECT * FROM akun WHERE username='$username' AND pass='$pass' AND hak_akses = 1 AND status = 'Tidak Aktif'";
            $result = mysqli_query($mysqli, $query);
            if (mysqli_num_rows($result) > 0) {
                $response = array(
                    'Response Code' => http_response_code(),
                    'status' => 0,
                    'message' => 'Akun masih belum diaktifkan.'
                );
            } else {
                $response = array(
                    'Response Code' => http_response_code(),
                    'status' => 0,
                    'message' => 'Username atau password salah.'
                );
            }
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function insert_User()
    {
        global $mysqli;
        $namadep = $_POST["firstname"];
        $namabel = $_POST["lastname"];
        $user = $_POST["username"];
        $pass = md5($_POST["pass"]);

        $sql = "INSERT INTO `akun` (`firstname`,`lastname`,`username`, `pass`) VALUES ('$namadep','$namabel','$user','$pass')";
        try {
            $result = mysqli_query($mysqli, $sql);
            if (!$result) {
                throw new Exception('Query error: ' . mysqli_error($mysqli));
            }

            $response = array(
                'Response Code' => http_response_code(),
                'status' => 1,
                'message' => 'Akun Sukses Ditambahkan.'
            );
        } catch (Exception $e) {
            if (strpos($e->getMessage(), "Duplicate entry") !== false) {
                // pesan error "Duplicate entry" menunjukkan entri duplikat
                $response = array(
                    'Response Code' => http_response_code(),
                    'status' => 0,
                    'message' => 'Username sudah digunakan.'
                );
            } else {
                // pesan error lainnya
                $response = array(
                    'Response Code' => http_response_code(),
                    'status' => 0,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                );
            }
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update_User($id_user)
    {
        global $mysqli;
        $namadep = $_POST['firstname'];
        $namabelak = $_POST['lastname'];
        $telp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $kampus = $_POST['asal_kampus'];

        $sumber = $_FILES['lampiran_pgd']['tmp_name'];
        $nama_gambar = $_FILES['lampiran_pgd']['name'];

        $sql = "UPDATE `akun` SET `firstname`= '$namadep',`lastname`= '$namabelak',`no_hp`= '$telp',`alamat`= '$alamat',`asal_kampus`= '$kampus' WHERE `id_user`= $id_user";
        $result = mysqli_query($mysqli, $sql);

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
                    'message' => 'Akun Updated Successfully.'
                );
            } else {
                $response = array(
                    'Response Code' => http_response_code(),
                    'status' => 0,
                    'message' => 'Akun Updated Failed.'
                );
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    function delete_User($id_user)
    {
        global $mysqli;
        $query = "DELETE FROM akun WHERE id_user=" . $id_user;
        if (mysqli_query($mysqli, $query)) {
            $response = array(
                'Response Code' => http_response_code(),
                'status' => 1,
                'message' => 'Akun Berhasil Terhapus.'
            );
        } else {
            $response = array(
                'Response Code' => http_response_code(),
                'status' => 0,
                'message' => 'Akun Gagal Terhapus.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
