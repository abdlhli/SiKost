<!-- //======================================================== QUERY TAMBAH DATA ===================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["tmbdatapembayaran"])) {
    $idpem = $_POST['tmbIdUserPem'];
    $tglpem = $_POST['tmbTglPem'];

    $sql = "INSERT INTO `pembayaran`(`id_user`, `tgl_pembayaran`) 
    VALUES ('$idpem','$tglpem')";

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
<div class="modal fade" id="tmb_data_pembayaran" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pembayaran
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="tmbIdUserPem">Nama Penghuni</label>
                        <select name="tmbIdUserPem" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                            <option disabled selected>Pilih Nama Penghuni</option>
                            <?php
                            include 'database/config.php';
                            $kamar = mysqli_query($conn, "SELECT * FROM `akun` WHERE hak_akses=1 AND NOT no_kamar='Kosong';");
                            while ($hasil = mysqli_fetch_array($kamar)) {
                            ?>
                                <option value="<?= $hasil['id_user'] ?>">
                                    <?php echo $hasil['firstname'], " ", $hasil['lastname']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="tmbTglPem">Tanggal Awal Pembayaran</label>
                        <input type="date" name="tmbTglPem" class="form-control form-control-sm" id="tmbTglPeng" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="tmbdatapembayaran" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>