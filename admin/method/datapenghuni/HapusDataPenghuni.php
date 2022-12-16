<!-- //======================================================= QUERY HAPUS DATA ====================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["hapusdatapenghuni"])) {
    $id = $_POST['hapusiduser'];

    $sql = "DELETE FROM akun WHERE `akun`.`id_user` = $id";

    $query = mysqli_query($conn, $sql);
}
?>
<!-- //======================================================== MODAL HAPUS DATA ===================================================================================// -->
<?php
$query = "SELECT * FROM akun WHERE `hak_akses` = 1";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <div class="modal fade" id="hapus_data_penghuni<?php echo $data['id_user']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Peringatan</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="hapusiduser" value="<?php echo $data['id_user'] ?>">
                <div class="col-12">
                    <div class="modal-body">
                        Apakah Anda Yakin Ingin Menghapus Data Ini?
                    </div>
                </div>
                <div class="col-12 row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                            Setuju Untuk Menghapus Data Penghuni - <?php echo $data['firstname'], " ", $data['lastname']; ?>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger btn-xs" name="hapusdatapenghuni">Iya</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>