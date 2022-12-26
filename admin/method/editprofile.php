<?php
include 'database/config.php';
if (isset($_POST["editpoto"])) {
    $user = $_SESSION['username'];
    $foto_lama = $_SESSION['foto_profile'];

    $sumber = @$_FILES['editprofile']['tmp_name'];
    $target = '../file/profile/';
    $nama_gambar = @$_FILES['editprofile']['name'];

    $pindah = move_uploaded_file($sumber, $target . $nama_gambar);

    $sql = "UPDATE `akun` SET `foto_profile`= '$nama_gambar' WHERE `username`= '$user'";

    if ($pindah) {
        if (mysqli_query($conn, $sql)) {
            unlink("../file/profile/$foto_lama");
?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Foto Berhasil Diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Foto Gagal Diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Proses Upload Foto Gagal.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php
    }
}
?>

<div class="modal fade" id="changePictureModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h2 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Ganti Foto</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="col">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editprofile" class="form-label">Ubah Foto Profile</label>
                            <input class="form-control form-control-sm" name="editprofile" id="editprofile" type="file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-xs" name="editpoto">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>