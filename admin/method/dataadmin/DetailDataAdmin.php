<!-- //======================================================== MODAL EDIT DATA ===================================================================================// -->
<?php
$query = "SELECT * FROM `akun` WHERE `hak_akses` = '0'";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>
    <div class="modal fade" id="detail_data_admin<?php echo $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
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
                                <label class="control-label" for="tmbNamaDepanAdmin">Nama Depan</label>
                                <input type="text" name="tmbNamaDepanAdmin" class="form-control form-control-sm" id="tmbNamaDepanAdmin" value="<?php echo $data['firstname']; ?>" readonly>
                            </div>
                            <div class="form-group col">
                                <label class="control-label" for="tmbNamaBelakangAdmin">Nama belakang</label>
                                <input type="text" name="tmbNamaBelakangAdmin" class="form-control form-control-sm" id="tmbNamaBelakangAdmin" value="<?php echo $data['lastname']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label class="control-label" for="tmbUserAdmin">Username</label>
                            <input type="text" name="tmbUserAdmin" class="form-control form-control-sm" id="tmbUserAdmin" value="<?php echo $data['username']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tmbTelpAdmin">No Telepon</label>
                            <input type="number" name="tmbTelpAdmin" class="form-control form-control-sm" id="tmbTelpAdmin" value="<?php echo $data['no_hp']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tmbAlamatAdmin">Alamat</label>
                            <input type="text" name="tmbAlamatAdmin" class="form-control form-control-sm" id="tmbAlamatAdmin" value="<?php echo $data['alamat']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tmbTglAdmin">Tanggal Masuk</label>
                            <input type="date" name="tmbTglAdmin" class="form-control form-control-sm" id="tmbTglAdmin" value="<?php echo $data['tgl_masuk']; ?>" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>