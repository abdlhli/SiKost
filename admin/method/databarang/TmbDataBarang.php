<!-- //======================================================== QUERY TAMBAH DATA ===================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["tmbdatabarang"])) {
    $namabarang = $_POST['tmbnamabarang'];
    $hargakamar = $_POST['tmbhargakamar'];

    $sql = "INSERT INTO `barang_tambahan`(`nama_barang`, `harga_barang`) VALUES ('$namabarang','$hargakamar')";

    if (mysqli_query($conn, $sql)) {
?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

    } else {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Gagal Ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    }
}

?>

<!-- //======================================================== MODAL TAMBAH DATA ===================================================================================// -->
<div class="modal fade" id="tmb_data_barang" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="tmbnamabarang">Nama Barang</label>
                        <input type="text" name="tmbnamabarang" class="form-control form-control-sm" id="" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tmbhargakamar">Harga Barang</label>
                        <input type="number" name="tmbhargakamar" class="form-control form-control-sm" id="" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="tmbdatabarang" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>