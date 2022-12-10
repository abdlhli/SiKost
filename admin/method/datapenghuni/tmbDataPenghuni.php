<!-- //======================================================== QUERY TAMBAH DATA ===================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["tmbdatapenghuni"])) {
    $namadep = $_POST['tmbNamaDepanPeng'];
    $namabelak = $_POST['tmbNamaBelakangPeng'];
    $telp = $_POST['tmbTelpPeng'];
    $alamat = $_POST['tmbAlamatPeng'];
    $tgl = $_POST['tmbTglPeng'];
    $asal = $_POST['tmbAsalKamPeng'];
    $stat = $_POST['tmbStatusPeng'];

    $sql = "INSERT INTO akun (firstname, lastname, no_hp, alamat, tgl_masuk, asal_kampus, status) 
    VALUES ('$namadep','$namabelak','$telp','$alamat','$tgl','$asal','$stat')";

    $query = mysqli_query($conn, $sql);
}

?>

<!-- //======================================================== MODAL TAMBAH DATA ===================================================================================// -->
<div class="modal fade" id="tmb_data_penghuni" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penghuni
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="tmbNoKamarPeng">No Kamar</label>
                        <select name="tmbNoKamarPeng" class="form-select form-select-sm" aria-label=".form-select-sm example">
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
                            <label class="control-label" for="tmbNamaDepanPeng">Nama
                                Depan</label>
                            <input type="text" name="tmbNamaDepanPeng" class="form-control form-control-sm" id="tmbNamaDepanPeng" required>
                        </div>
                        <div class="form-group col">
                            <label class="control-label" for="tmbNamaBelakangPeng">Nama
                                belakang</label>
                            <input type="text" name="tmbNamaBelakangPeng" class="form-control form-control-sm" id="tmbNamaBelakangPeng">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tmbTelpPeng">No
                            Telepon</label>
                        <input type="number" name="tmbTelpPeng" class="form-control form-control-sm" id="tmbTelpPeng" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tmbAlamatPeng">Alamat</label>
                        <input type="text" name="tmbAlamatPeng" class="form-control form-control-sm" id="tmbAlamatPeng" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tmbTglPeng">Tanggal
                            Masuk</label>
                        <input type="date" name="tmbTglPeng" class="form-control form-control-sm" id="tmbTglPeng" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tmbAsalKamPeng">Asal
                            Kampus</label>
                        <input type="text" name="tmbAsalKamPeng" class="form-control form-control-sm" id="tmbAsalKamPeng" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Status</label>
                        <select name="tmbStatusPeng" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Pilih Status Penghuni</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="tmbdatapenghuni" class="btn btn-primary">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>