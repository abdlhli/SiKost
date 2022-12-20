<!-- //======================================================= QUERY EDIT DATA ====================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["editdatapenghuni"])) {
    $namadep = $_POST['editNamaDepanPeng'];
    $namabelak = $_POST['editNamaBelakangPeng'];
    $telp = $_POST['editTelpPeng'];
    $alamat = $_POST['editAlamatPeng'];
    $tgl = $_POST['editTglPeng'];
    $asal = $_POST['editAsalKamPeng'];
    $stat = $_POST['editStatusPeng'];
    $id = $_POST['editIdUser'];
    $nokamar = $_POST['editNoKamarPeng'];

    $sql = "UPDATE `akun` SET `firstname`= '$namadep',`lastname`= '$namabelak',`no_hp`= '$telp',`alamat`= '$alamat',`tgl_masuk`= '$tgl',`asal_kampus`= '$asal', `status`= '$stat', `no_kamar`= '$nokamar' WHERE `id_user`= $id";

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

$query = "SELECT * FROM `akun` WHERE `hak_akses` = '1'";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
    ?>

    <div class="modal fade" id="edit_data_penghuni<?php echo $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Edit Data Penghuni
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="editNoKamarPeng">No Kamar</label>
                            <select name="editNoKamarPeng" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected hidden><?php echo $data['no_kamar'] ?></option>
                                <?php
                                include 'database/config.php';
                                $kamar = mysqli_query($conn, "SELECT `no_kamar` FROM `kamar` WHERE status_kmr = 'Kosong' ORDER BY CASE WHEN no_kamar LIKE 'Kosong%' THEN 1 ELSE 2 END, no_kamar * 1 ASC;");
                                while ($hasilnokamar = mysqli_fetch_array($kamar)) {
                                ?>
                                    <option value="<?= $hasilnokamar['no_kamar'] ?>"><?= $hasilnokamar['no_kamar'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <input type="hidden" name="editIdUser" value="<?php echo $data['id_user'] ?>">

                        <div class="row">
                            <div class="form-group col">
                                <label class="control-label" for="editNamaDepanPeng">Nama Depan</label>
                                <input type="text" name="editNamaDepanPeng" class="form-control form-control-sm" id="editNamaDepanPeng" value="<?php echo $data['firstname']; ?>" required>
                            </div>
                            <div class="form-group col">
                                <label class="control-label" for="editNamaBelakangPeng">Nama belakang</label>
                                <input type="text" name="editNamaBelakangPeng" class="form-control form-control-sm" id="editNamaBelakangPeng" value="<?php echo $data['lastname']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="editTelpPeng">No Telepon</label>
                            <input type="number" name="editTelpPeng" class="form-control form-control-sm" id="editTelpPeng" value="<?php echo $data['no_hp']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="editAlamatPeng">Alamat</label>
                            <input type="text" name="editAlamatPeng" class="form-control form-control-sm" id="editAlamatPeng" value="<?php echo $data['alamat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="editTglPeng">Tanggal Masuk</label>
                            <input type="date" name="editTglPeng" class="form-control form-control-sm" id="editTglPeng" value="<?php echo $data['tgl_masuk']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="editAsalKamPeng">Asal Kampus</label>
                            <input type="text" name="editAsalKamPeng" class="form-control form-control-sm" id="editAsalKamPeng" value="<?php echo $data['asal_kampus']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Status</label>
                            <select name="editStatusPeng" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected><?php echo $data['status']; ?></option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="editdatapenghuni" class="btn btn-primary">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>