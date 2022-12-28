<!-- //======================================================= QUERY EDIT DATA ====================================================================================// -->
<?php
include 'database/config.php';

if (isset($_POST["editdataadmin"])) {
    $namadep = $_POST['editNamaDepanAdmin'];
    $namabelak = $_POST['editNamaBelakangAdmin'];
    $user = $_POST['editUserAdmin'];
    $pass = md5($_POST['editPassAdmin']);
    $telp = $_POST['editTelpAdmin'];
    $alamat = $_POST['editAlamatAdmin'];
    $tgl = $_POST['editTglAdmin'];
    $id = $_POST['editIdUser'];
    $stat = $_POST['editStatusAdmin'];

    $sqledit = "UPDATE `akun` SET `firstname`= '$namadep',`lastname`= '$namabelak',`username`= '$user',`no_hp`= '$telp',`alamat`= '$alamat',`tgl_masuk`= '$tgl',`status`= '$stat' WHERE `id_user`= $id";
    $sqledit1 = "UPDATE `akun` SET `firstname`= '$namadep',`lastname`= '$namabelak',`pass`= '$pass',`username`= '$user',`no_hp`= '$telp',`alamat`= '$alamat',`tgl_masuk`= '$tgl',`status`= '$stat' WHERE `id_user`= $id";

    $password = $_POST['editPassAdmin'];;
    $password_confirm = $_POST['password_confirm'];;

    if (isset($_POST['ubah_password']) && $_POST['ubah_password'] == 1) {
        // Proses validasi password baru
        if ($password != $password_confirm) {
            // Tampilkan pesan error jika password dan konfirmasi password tidak sama dan kembali ke form edit akun
?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password Yang Diinputkan Tidak Sama.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        } else {
            // Proses update akun termasuk password baru
            if (mysqli_query($conn, $sqledit1)) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berhasil Diubah Beserta Passwordnya.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php

            } else {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Gagal Diubah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
        }
    } else {
        // Proses update akun tanpa merubah password
        if (mysqli_query($conn, $sqledit)) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php

        } else { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Gagal Diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> <?php
                }
            }
        }

        //======================================================== MODAL EDIT DATA ===================================================================================//

        $query = "SELECT * FROM `akun` WHERE `hak_akses` = '0'";
        $hasil = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
                    ?>
    <div class="modal fade" id="edit_data_admin<?php echo $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Admin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="hidden" name="editIdUser" value="<?php echo $data['id_user'] ?>">

                        <div class="row">
                            <div class="form-group col">
                                <label class="control-label" for="editNamaDepanAdmin">Nama Depan</label>
                                <input type="text" name="editNamaDepanAdmin" class="form-control form-control-sm" id="editNamaDepanAdmin" value="<?php echo $data['firstname']; ?>" required>
                            </div>
                            <div class="form-group col">
                                <label class="control-label" for="editNamaBelakangAdmin">Nama belakang</label>
                                <input type="text" name="editNamaBelakangAdmin" class="form-control form-control-sm" id="editNamaBelakangAdmin" value="<?php echo $data['lastname']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="editUserAdmin">Username</label>
                            <input type="text" name="editUserAdmin" class="form-control form-control-sm" id="editUserAdmin" value="<?php echo $data['username']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="editTelpAdmin">No Telepon</label>
                            <input type="number" name="editTelpAdmin" class="form-control form-control-sm" id="editTelpAdmin" value="<?php echo $data['no_hp']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="editAlamatAdmin">Alamat</label>
                            <input type="text" name="editAlamatAdmin" class="form-control form-control-sm" id="editAlamatAdmin" value="<?php echo $data['alamat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="editTglAdmin">Tanggal Masuk</label>
                            <input type="date" name="editTglAdmin" class="form-control form-control-sm" id="editTglAdmin" value="<?php echo $data['tgl_masuk']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Status</label>
                            <select name="editStatusAdmin" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option hidden selected><?php echo $data['status']; ?></option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ubah_password">Ubah Password</label>
                            <div class="form-group">
                                <input type="checkbox" id="ubah_password" name="ubah_password" value="1">
                                <label class="prevent-select" for="ubah_password"> Ya, saya ingin mengubah password</label>
                            </div>
                        </div>
                        <div id="form_password" style="display: none;">
                            <div class="form-group">
                                <label for="editPassAdmin">Password Baru</label>
                                <input type="password" class="form-control form-control-sm" id="editPassAdmin" name="editPassAdmin" placeholder="Masukkan password baru">
                            </div>
                            <div class="form-group">
                                <label for="password_confirm">Konfirmasi Password</label>
                                <input type="password" class="form-control form-control-sm" id="password_confirm" name="password_confirm" placeholder="Masukkan kembali password baru">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="editdataadmin" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var checkbox = document.getElementById("ubah_password");
        var formPassword = document.getElementById("form_password");

        checkbox.addEventListener("change", function() {
            if (this.checked) {
                formPassword.style.display = "block";
            } else {
                formPassword.style.display = "none";
            }
        });
    </script>

<?php
        }
?>