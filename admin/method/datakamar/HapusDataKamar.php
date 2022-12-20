<!-- //======================================================= QUERY HAPUS DATA ====================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["hapusdatakamar"])) {
    $no_kamar = $_POST['hapuskamar'];

    $sql = "DELETE FROM `kamar` WHERE `kamar`.`no_kamar` = '$no_kamar'";

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

//======================================================== MODAL HAPUS DATA ===================================================================================// 

$query = "SELECT * FROM `kamar`;";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
    ?>

    <div class="modal fade" id="hapus_data_kamar<?php echo $data['no_kamar']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Peringatan</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-12">
                        <input type="hidden" name="hapuskamar" value="<?php echo $data['no_kamar']; ?>">
                        <div class="col-15">
                            <div class="modal-body">
                                Apakah Anda Yakin Ingin Menghapus Data Ini?
                            </div>
                        </div>
                        <div class="col-13 row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="invalidCheck2" required>
                                <label class="form-check-label text-danger" for="invalidCheck2">
                                    Centang Untuk Setuju Menghapus Data Pada Kamar <?php echo $data['no_kamar']; ?>.
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-xs" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger btn-xs" name="hapusdatakamar">Iya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>