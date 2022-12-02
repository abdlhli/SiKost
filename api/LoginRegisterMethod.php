<?php
require_once "koneksi.php";

//-------------- mendaftarkan user -------------------//
function register_user($name, $password, $email)
{
    global $link;

    //mencegah sql injection
    $nama = escape($name);
    $pass = escape($password);

    $hash = hashSSHA($pass); //mengencrypt password

    $salt = $hash["salt"]; //berisi kode string random yang nantinya                             digunakan saat proses decrypt pada proses validasi

    $encrypted_password = $hash["encrypted"]; //mengambil data password yang sudah di enkripsi untuk ditampung pada variabel encrypted_password


    $query = "INSERT INTO users(user_username, user_password, unique_id, user_email) VALUES('$nama', '$encrypted_password', '$salt', '$email') ON DUPLICATE KEY UPDATE unique_id = '$salt'";

    $user_new = mysqli_query($link, $query);
    if ($user_new) {
        $usr = "SELECT * FROM users WHERE user_username = '$nama'";
        $result = mysqli_query($link, $usr);
        $user = mysqli_fetch_assoc($result);
        return $user;
    } else {
        return NULL;
    }
}
//-------------- *** end *** -------------------//

//---- mencegah sql injection -----//
function escape($data)
{
    global $link;
    return mysqli_real_escape_string($link, $data);
}
//----------- *** end *** ---------//

//--- mengecek nama apakah sudah terdaftar atau belum ---//
function cek_nama($name)
{
    global $link;
    $query = "SELECT * FROM users WHERE user_username = '$name'";
    if ($result = mysqli_query($link, $query))
        return mysqli_num_rows($result);
}
//---------------- *** end ***-------------------------//

//------------ mengenkripsi password ----------------//
function hashSSHA($password)
{
    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
    $hash = array("salt" => $salt, "encrypted" => $encrypted);
    return $hash;
}
//------------ *** end *** -------------------------//

// -------- mengenkripsi password yang dimasukkan user saat login -->
function checkhashSSHA($salt, $password)
{
    $hash = base64_encode(sha1($password . $salt, true) . $salt);
    return $hash;
}
//------------ *** end *** -------------------------//
//----------------- cek data user dan validasi------------------//
function cek_data_user($name, $pass)
{
    global $link;
    //mencegah sql injection
    $nama = escape($name);
    $password = escape($pass);

    $query = "SELECT * FROM users WHERE user_username = '$nama'";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($result);

    $unique_id = $data['unique_id'];
    $encrypted_password = $data['user_password'];
    // mengencrypt password
    $hash = checkhashSSHA($unique_id, $password);
    //validasi password
    if ($encrypted_password == $hash) {
        return $data;
    } else {
        return false;
    }
}
//---------------------- *** end *** -------------------------//
?>

'
<?php
class DB_Functions
{
    private $conn;
    // constructor
    function __construct()
    {
        require_once 'koneksi.php';
        // koneksi ke database
        // $db = new Db_Connect();
        // $this->conn = $db->connect();
    }
    // destructor
    function __destruct()
    {

    }
    public function simpanUser($nama, $email, $password)
    {
        $uuid = uniqid('', true);
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
        $stmt = $this->conn->prepare("INSERT INTO tbl_user(unique_id, nama, email, encrypted_password, salt) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $uuid, $nama, $email, $encrypted_password, $salt);
        $result = $stmt->execute();
        $stmt->close();
        // cek jika sudah sukses
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM tbl_user WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return false;
        }
    }
    /**
     * Get user berdasarkan email dan password
     */
    public function getUserByEmailAndPassword($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_user WHERE email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            // verifikasi password user
            $salt = $user['salt'];
            $encrypted_password = $user['encrypted_password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // cek password jika sesuai
            if ($encrypted_password == $hash) {
                // autentikasi user berhasil
                return $user;
            }
        } else {
            return NULL;
        }
    }
    /**
     * Cek User ada atau tidak
     */
    public function isUserExisted($email)
    {
        $stmt = $this->conn->prepare("SELECT email from tbl_user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // user telah ada 
            $stmt->close();
            return true;
        } else {
            // user belum ada 
            $stmt->close();
            return false;
        }
    }
    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password)
    {
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password)
    {
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
        return $hash;
    }
}
?>'