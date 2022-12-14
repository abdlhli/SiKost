<!-- //======================================================= QUERY HAPUS DATA ====================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["hapusdataadmin"])) {
    $id = $_POST['hapusidbarang'];

    $sql = "DELETE FROM `barang_tambahan` WHERE `id_barang` = $id";

    if (mysqli_query($conn, $sql)) {
?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Terhapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

    } else {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Gagal Terhapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    }
}
?>
<!-- //======================================================== MODAL HAPUS DATA ===================================================================================// -->
<?php
$query = "SELECT * FROM `barang_tambahan`";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <div class="modal fade" id="hapus_data_barang<?php echo $data['id_barang']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Peringatan</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <input type="hidden" name="hapusidbarang" value="<?php echo $data['id_barang'] ?>">
                        <div class="col-15">
                            <div class="modal-body">
                                Apakah Anda Yakin Ingin Menghapus Data Ini?
                            </div>
                        </div>
                        <div class="col-13 row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="<?php echo $data['id_barang']; ?>" required>
                                <label class="form-check-label text-danger" for="<?php echo $data['id_barang']; ?>">
                                    Centang Untuk Setuju Menghapus Barang - <?php echo $data['nama_barang']; ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-xs" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger btn-xs" name="hapusdataadmin">Iya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>