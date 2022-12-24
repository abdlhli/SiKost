<!-- //======================================================== QUERY TAMBAH DATA ===================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["editdatabarang"])) {
    $idbarang = $_POST['editidbarang'];
    $namabarang = $_POST['editnamabarang'];
    $hargakamar = $_POST['edithargakamar'];

    $sql = "UPDATE `barang_tambahan` SET `nama_barang`='$namabarang',`harga_barang`='$hargakamar' WHERE `id_barang`='$idbarang'";

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



//======================================================== MODAL TAMBAH DATA ===================================================================================//
$query = "SELECT * FROM `barang_tambahan`";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
    ?>
    <div class="modal fade" id="edit_data_barang<?php echo $data['id_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Barang</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="hidden" name="editidbarang" value="<?php echo $data['id_barang'] ?>">

                        <div class="form-group">
                            <label class="control-label" for="editnamabarang">Nama Barang</label>
                            <input type="text" name="editnamabarang" class="form-control form-control-sm" id="" value="<?php echo $data['nama_barang']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="edithargakamar">Harga Barang</label>
                            <input type="number" name="edithargakamar" class="form-control form-control-sm" id="" value="<?php echo $data['harga_barang']; ?>" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="editdatabarang" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>