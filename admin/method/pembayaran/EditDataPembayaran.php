<!-- //======================================================== QUERY EDIT DATA ===================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["editdatapembayaran"])) {
    $idpem = $_POST['editIdPem'];
    $iduser = $_POST['editIduser'];
    // $kuitansi = $_POST['kuitansipem'];
    $statuspem = $_POST['editStatusPem'];
    $tglpem = $_POST['tglpem'];

    $sql = "UPDATE `pembayaran` SET `status_pembayaran`='$statuspem' WHERE id_pembayaran = $idpem";

    if (mysqli_query($conn, $sql)) { ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php

        $dt = strtotime($tglpem);
        $tglpemblndpn = date("Y-m-d", strtotime("+1 month", $dt)) . "\n";

        $sql1 = "INSERT INTO `pembayaran`(`id_user`, `tgl_pembayaran`) 
                VALUES ('$iduser','$tglpemblndpn')";
        mysqli_query($conn, $sql1);
    } else {    ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Gagal Diubah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
}


//======================================================== MODAL EDIT DATA ===================================================================================// -->
$query = "SELECT * FROM `pembayaran` JOIN akun ON pembayaran.id_user = akun.id_user";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
    ?>

    <div class="modal fade" id="edit_data_pembayaran<?php echo $data['id_pembayaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pembayaran
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="hidden" name="editIdPem" value="<?php echo $data['id_pembayaran'] ?>">

                        <input type="hidden" name="editIduser" value="<?php echo $data['id_user'] ?>">

                        <input type="hidden" name="tglpem" value="<?php echo $data['tgl_pembayaran'] ?>">

                        <div class="mb-3">
                            <label for="kuitansipem" class="form-label">Input File Foto Kuitansi</label>
                            <input class="form-control form-control-sm" id="kuitansipem" type="file">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Status Pembayaran</label>
                            <select name="editStatusPem" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                                <option hidden disabled selected><?php echo $data['status_pembayaran']; ?></option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>
                        <div class="col-13 row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" required>
                                <label class="form-check-label text-danger">
                                    Centang Untuk Setuju Mengubah Pembayaran Penghuni <?php echo $data['firstname'], " ", $data['lastname']; ?> Menjadi LUNAS
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="editdatapembayaran" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>