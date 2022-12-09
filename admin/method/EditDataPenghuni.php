<?php
// include 'database/config.php';

// if (isset($_POST["editdatapenghuni"])) {
//     $namadep = $_POST['editNamaDepanPeng'];
//     $namabelak = $_POST['editNamaBelakangPeng'];
//     $telp = $_POST['editTelpPeng'];
//     $alamat = $_POST['editAlamatPeng'];
//     $tgl = $_POST['editTglPeng'];
//     $asal = $_POST['editAsalKamPeng'];
//     $stat = $_POST['editStatusPeng'];

//     $sql2 = "UPDATE `akun` SET `firstname`='$namadep',`lastname`='$namabelak',`no_hp`='$telp',`alamat`='$alamat',`tgl_masuk`='$tgl',`asal_kampus`='$asal',`status`='$stat' WHERE ";

//     $query = mysqli_query($conn, $sql, $sql2);
// }
?>

<div class="modal fade" id="edit_data_penghuni" tabindex="-1" aria-labelledby="exampleModalLabel">
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
                        <select name="editNoKamarPeng" class="form-select form-select-sm"
                            aria-label=".form-select-sm example">
                            <option disabled selected>Pilih No Kamar</option>
                            <?php
                            include 'database/config.php';
                            $kamar = mysqli_query($conn, "SELECT `no_kamar` FROM `kamar` WHERE id_user IS NULL ORDER BY `kamar`.`no_kamar` * 1 ASC;");
                            while ($hasil = mysqli_fetch_array($kamar)) {
                            ?>
                            <option value="<?= $hasil['no_kamar'] ?>">
                                <?= $hasil['no_kamar'] ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="control-label" for="editNamaDepanPeng">Nama
                                Depan</label>
                            <input type="text" name="editNamaDepanPeng" class="form-control form-control-sm"
                                id="editNamaDepanPeng" required>
                        </div>
                        <div class="form-group col">
                            <label class="control-label" for="editNamaBelakangPeng">Nama
                                belakang</label>
                            <input type="text" name="editNamaBelakangPeng" class="form-control form-control-sm"
                                id="editNamaBelakangPeng">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="editTelpPeng">No
                            Telepon</label>
                        <input type="number" name="editTelpPeng" class="form-control form-control-sm" id="editTelpPeng"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="editAlamatPeng">Alamat</label>
                        <input type="text" name="editAlamatPeng" class="form-control form-control-sm"
                            id="editAlamatPeng" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="editTglPeng">Tanggal
                            Masuk</label>
                        <input type="date" name="editTglPeng" class="form-control form-control-sm" id="editTglPeng"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="editAsalKamPeng">Asal
                            Kampus</label>
                        <input type="text" name="editAsalKamPeng" class="form-control form-control-sm"
                            id="editAsalKamPeng" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Status</label>
                        <select name="editStatusPeng" class="form-select form-select-sm"
                            aria-label=".form-select-sm example">
                            <option selected>Pilih Status Penghuni</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
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