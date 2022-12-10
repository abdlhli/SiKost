<!-- //======================================================= QUERY EDIT DATA ====================================================================================// -->
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

//     $sql = "UPDATE `akun` SET 
//     `firstname`='[editNamaDepanPeng]',
//     `lastname`='[editNamaBelakangPeng]',
//     `no_hp`='[editTelpPeng]',
//     `alamat`='[editAlamatPeng]',
//     `tgl_masuk`='[editTglPeng]',
//     `asal_kampus`='[editAsalKamPeng]',
//     `status`='[editStatusPeng]' 
//     WHERE id_user=2";

//     $query = mysqli_query($conn, $sql);
// }

//======================================================== MODAL EDIT DATA ===================================================================================//
$query = "SELECT * FROM akun Where id_user=2";
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

                    <?php
                    $id = $data['id_user'];
                    $query_edit = "SELECT * FROM akun WHERE id_user='$id'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>

                        <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="editNoKamarPeng">No Kamar</label>
                                <select name="editNoKamarPeng" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option disabled selected>Pilih No Kamar</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label class="control-label" for="editNamaDepanPeng">Nama Depan</label>
                                    <input type="text" name="editNamaDepanPeng" class="form-control form-control-sm" id="editNamaDepanPeng" value="<?php echo $row['firstname']; ?>" required>
                                </div>
                                <div class="form-group col">
                                    <label class="control-label" for="editNamaBelakangPeng">Nama belakang</label>
                                    <input type="text" name="editNamaBelakangPeng" class="form-control form-control-sm" id="editNamaBelakangPeng" value="<?php echo $row['lastname']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="editTelpPeng">No Telepon</label>
                                <input type="number" name="editTelpPeng" class="form-control form-control-sm" id="editTelpPeng" value="<?php echo $row['no_hp']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="editAlamatPeng">Alamat</label>
                                <input type="text" name="editAlamatPeng" class="form-control form-control-sm" id="editAlamatPeng" value="<?php echo $row['alamat']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="editTglPeng">Tanggal Masuk</label>
                                <input type="date" name="editTglPeng" class="form-control form-control-sm" id="editTglPeng" value="<?php echo $row['tgl_masuk']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="editAsalKamPeng">Asal Kampus</label>
                                <input type="text" name="editAsalKamPeng" class="form-control form-control-sm" id="editAsalKamPeng" value="<?php echo $row['asal_kampus']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="">Status</label>
                                <select name="editStatusPeng" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected><?php echo $row['status']; ?></option>
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
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>