<!-- //======================================================== QUERY EDIT DATA ===================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["editdatakamar"])) {
    $nokamar = $_POST['editnokamar'];
    $jeniskamar = $_POST['editjeniskamar'];

    $sql = "INSERT INTO `kamar`(`no_kamar`, `id_jenis_kamar`) VALUES ('$nokamar','$jeniskamar')";

    if (mysqli_query($conn, $sql)) {
?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

    } else {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Gagal Diubah
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
}

//======================================================== MODAL EDIT DATA ===================================================================================// 
$query = "SELECT * FROM `kamar` JOIN jenis_kamar ON kamar.id_jenis_kamar = jenis_kamar.id_jenis_kamar;";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
    ?>
    <div class="modal fade" id="edit_data_kamar<?php echo $data['no_kamar'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kamar</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="editnokamar">No Kamar</label>
                            <input type="text" name="editnokamar" class="form-control form-control-sm" id="" value="<?php echo $data['no_kamar'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="editjeniskamar">ID Jenis Kamar</label>
                            <select name="editjeniskamar" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                                <option selected><?php echo $data['keterangan']; ?></option>
                                <option value="<?php echo $data['id_jenis_kamar'] ?>"><?php echo $data['keterangan'] ?></option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="editdatakamar" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>