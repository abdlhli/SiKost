<!-- //======================================================== QUERY TAMBAH DATA ===================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["tmbdatakamar"])) {
    $nokamar = $_POST['tmbnokamar'];
    $jeniskamar = $_POST['tmbjeniskamar'];

    $sql = "INSERT INTO `kamar`(`no_kamar`, `id_jenis_kamar`) VALUES ('$nokamar','$jeniskamar')";

    if (mysqli_query($conn, $sql)) {
?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

    } else {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Gagal Ditambahkan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    }
}

?>

<!-- //======================================================== MODAL TAMBAH DATA ===================================================================================// -->
<div class="modal fade" id="tmb_data_kamar" tabindex="-1" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kamar</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="tmbnokamar">No Kamar</label>
                        <input type="text" name="tmbnokamar" class="form-control form-control-sm" id="" required>
                    </div>
                    <div class="invalid-feedback">
                        Tolong Isi Pada No Kamar.
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tmbjeniskamar">ID Jenis Kamar</label>
                        <select name="tmbjeniskamar" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                            <option hidden selected>Pilih Jenis Kamar</option>
                            <?php
                            include 'database/config.php';
                            $jeniskamar = mysqli_query($conn, "SELECT * FROM `jenis_kamar`");
                            while ($hasilJK = mysqli_fetch_array($jeniskamar)) {
                            ?>
                                <option value="<?= $hasilJK['id_jenis_kamar'] ?>"><?= $hasilJK['keterangan'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Tolong Isi Pada Jenis Kamar.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="tmbdatakamar" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
            </form>
        </div>
    </div>
</div>