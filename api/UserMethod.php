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

        $sql = "SELECT * FROM akun WHERE username='$username' AND pass='$pass' AND hak_akses = 1";
        $result = mysqli_query($mysqli, $sql);

        // Memeriksa hasil perintah SQL
        if (mysqli_num_rows($result) > 0) {
            $response = array(
                'Response Code' => http_response_code(),
                'status' => 1,
                'message' => 'Login Berhasil.'
            );
        } else {
            $response = array(
                'Response Code' => http_response_code(),
                'status' => 0,
                'message' => 'Login gagal.'
            );
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
        $result = mysqli_query($mysqli, $sql);

        if ($result) {
            $response = array(
                'Response Code' => http_response_code(),
                'status' => 1,
                'message' => 'Akun Sukses Ditambahkan.'
            );
        } else {
            $response = array(
                'Response Code' => http_response_code(),
                'status' => 0,
                'message' => 'Akun Gagal Ditambahkan, Username sudah digunakan.'
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function update_User($id_user)
    {
        global $mysqli;
        if (isset($_POST["editdataadmin"])) {
            $namadep = $_POST['firstname'];
            $namabelak = $_POST['lastname'];
            $telp = $_POST['editTelpAdmin'];
            $alamat = $_POST['editAlamatAdmin'];
            $kampus = $_POST['asal_kampus'];

            $sql = "UPDATE `akun` SET `firstname`= '$namadep',`lastname`= '$namabelak',`no_hp`= '$telp',`alamat`= '$alamat',`asal_kampus`= '$kampus' WHERE `id_user`= $id_user";
            $result = mysqli_query($mysqli, $sql);

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
