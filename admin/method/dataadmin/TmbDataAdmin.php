<!-- //======================================================== QUERY TAMBAH DATA ===================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["tmbdataAdmin"])) {
    $namadep = $_POST['tmbNamaDepanAdmin'];
    $namabelak = $_POST['tmbNamaBelakangAdmin'];
    $user = $_POST['tmbUserAdmin'];
    $pass = $_POST['tmbPassAdmin'];
    $telp = $_POST['tmbTelpAdmin'];
    $alamat = $_POST['tmbAlamatAdmin'];
    $tgl = $_POST['tmbTglAdmin'];

    $sql = "INSERT INTO akun (firstname, lastname, pass, username, no_hp, alamat, tgl_masuk, hak_akses) 
    VALUES ('$namadep','$namabelak','$pass','$user','$telp','$alamat','$tgl','0')";

    $query = mysqli_query($conn, $sql);
}

?>

<!-- //======================================================== MODAL TAMBAH DATA ===================================================================================// -->
<div class="modal fade" id="tmb_data_admin" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Admin</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col">
                            <label class="control-label" for="tmbNamaDepanAdmin">Nama Depan</label>
                            <input type="text" name="tmbNamaDepanAdmin" class="form-control form-control-sm" id="tmbNamaDepanAdmin" required>
                        </div>
                        <div class="form-group col">
                            <label class="control-label" for="tmbNamaBelakangAdmin">Nama belakang</label>
                            <input type="text" name="tmbNamaBelakangAdmin" class="form-control form-control-sm" id="tmbNamaBelakangAdmin">
                        </div>
                    </div>
                    <div class="form-group col">
                        <label class="control-label" for="tmbUserAdmin">Username</label>
                        <input type="text" name="tmbUserAdmin" class="form-control form-control-sm" id="tmbUserAdmin" required>
                    </div>
                    <div class="form-group col">
                        <label class="control-label" for="tmbPassAdmin">Password</label>
                        <input type="password" name="tmbPassAdmin" class="form-control form-control-sm" id="tmbPassAdmin" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tmbTelpAdmin">No Telepon</label>
                        <input type="number" name="tmbTelpAdmin" class="form-control form-control-sm" id="tmbTelpAdmin" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tmbAlamatAdmin">Alamat</label>
                        <input type="text" name="tmbAlamatAdmin" class="form-control form-control-sm" id="tmbAlamatAdmin" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tmbTglAdmin">Tanggal Masuk</label>
                        <input type="date" name="tmbTglAdmin" class="form-control form-control-sm" id="tmbTglAdmin" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="tmbdataAdmin" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>