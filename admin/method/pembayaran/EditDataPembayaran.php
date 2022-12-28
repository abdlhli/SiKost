<!-- //======================================================== QUERY EDIT DATA ===================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["editdatapembayaran"])) {
    $idpem = $_POST['editIdPem'];
    $iduser = $_POST['editIduser'];
    $kamar = $_POST['editkamar'];
    $harga = $_POST['editharga'];
    $tglpem = $_POST['tglpem'];

    $sumber = @$_FILES['kuitansipem']['tmp_name'];
    $target = '../file/kuitansi/';
    $nama_gambar = @$_FILES['kuitansipem']['name'];

    $pindah = move_uploaded_file($sumber, $target . $nama_gambar);

    $sql = "UPDATE `pembayaran` SET `foto_kuitansi`= '$nama_gambar',`status_pembayaran`='Lunas' WHERE id_pembayaran = $idpem";

    if ($pindah) {
        if (mysqli_query($conn, $sql)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Diubah Menjadi Lunas.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> <?php
                    $dt = strtotime($tglpem);
                    $tglpemblndpn = date("Y-m-d", strtotime("+1 month", $dt)) . "\n";

                    $sql1 = "INSERT INTO `pembayaran`(`id_user`, `kamar`, `tgl_pembayaran`, `harga_kamar`) 
                    VALUES ('$iduser','$kamar','$tglpemblndpn','$harga')";
                    mysqli_query($conn, $sql1);
                } else {    ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Gagal Diubah Menjadi Lunas.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
                }
            } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Upload Kuitansi Gagal.
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

                        <input type="hidden" name="editkamar" value="<?php echo $data['kamar'] ?>">

                        <input type="hidden" name="editharga" value="<?php echo $data['harga_kamar'] ?>">

                        <input type="hidden" name="tglpem" value="<?php echo $data['tgl_pembayaran'] ?>">

                        <div class="mb-3">
                            <label for="kuitansipem" class="form-label">Input File Foto Kuitansi</label>
                            <input class="form-control form-control-sm" name="kuitansipem" id="kuitansipem" type="file" required>
                        </div>
                        <div class="col-13 row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" required>
                                <label class="form-check-label text-danger prevent-select">
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