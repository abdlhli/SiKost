<!-- //======================================================= QUERY EDIT DATA ====================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["editdataadmin"])) {
    $namadep = $_POST['tmbNamaDepanAdmin'];
    $namabelak = $_POST['tmbNamaBelakangAdmin'];
    $user = $_POST['tmbUserAdmin'];
    $pass = $_POST['tmbPassAdmin'];
    $telp = $_POST['tmbTelpAdmin'];
    $alamat = $_POST['tmbAlamatAdmin'];
    $tgl = $_POST['tmbTglAdmin'];
    $id = $_POST['editIdUser'];

    $sql = "UPDATE `akun` SET `firstname`= '$namadep',`lastname`= '$namabelak',`pass`= '$pass',`username`= '$user',`no_hp`= '$telp',`alamat`= '$alamat',`tgl_masuk`= '$tgl' WHERE `id_user`= $id";

    if (mysqli_query($conn, $sql)) {
?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

    } else {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Gagal Diubah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
}

//======================================================== MODAL EDIT DATA ===================================================================================//

$query = "SELECT * FROM `akun` WHERE `hak_akses` = '0'";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
    ?>
    <div class="modal fade" id="edit_data_admin<?php echo $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Admin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="hidden" name="editIdUser" value="<?php echo $data['id_user'] ?>">

                        <div class="row">
                            <div class="form-group col">
                                <label class="control-label" for="tmbNamaDepanAdmin">Nama Depan</label>
                                <input type="text" name="tmbNamaDepanAdmin" class="form-control form-control-sm" id="tmbNamaDepanAdmin" value="<?php echo $data['firstname']; ?>" required>
                            </div>
                            <div class="form-group col">
                                <label class="control-label" for="tmbNamaBelakangAdmin">Nama belakang</label>
                                <input type="text" name="tmbNamaBelakangAdmin" class="form-control form-control-sm" id="tmbNamaBelakangAdmin" value="<?php echo $data['lastname']; ?>">
                            </div>
                        </div>
                        <div class="form-group col">
                            <label class="control-label" for="tmbUserAdmin">Username</label>
                            <input type="text" name="tmbUserAdmin" class="form-control form-control-sm" id="tmbUserAdmin" value="<?php echo $data['username']; ?>" required>
                        </div>
                        <div class="form-group col">
                            <label class="control-label" for="tmbPassAdmin">Password</label>
                            <input type="password" name="tmbPassAdmin" class="form-control form-control-sm" id="tmbPassAdmin" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tmbTelpAdmin">No Telepon</label>
                            <input type="number" name="tmbTelpAdmin" class="form-control form-control-sm" id="tmbTelpAdmin" value="<?php echo $data['no_hp']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tmbAlamatAdmin">Alamat</label>
                            <input type="text" name="tmbAlamatAdmin" class="form-control form-control-sm" id="tmbAlamatAdmin" value="<?php echo $data['alamat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tmbTglAdmin">Tanggal Masuk</label>
                            <input type="date" name="tmbTglAdmin" class="form-control form-control-sm" id="tmbTglAdmin" value="<?php echo $data['tgl_masuk']; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="editdataadmin" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>