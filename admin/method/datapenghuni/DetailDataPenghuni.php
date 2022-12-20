<?php
$query = "SELECT * FROM akun WHERE `hak_akses` = 1";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <div class="modal fade" id="detail_data_penghuni<?php echo $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Detail Data Penghuni
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="showNoKamarPeng">No Kamar</label>
                            <input type="text" name="showNoKamarPeng" class="form-control form-control-sm" id="showNoKamarPeng" value="<?php echo $data['no_kamar']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="showNamaPeng">Nama Penghuni</label>
                            <input type="text" name="showNamaPeng" class="form-control form-control-sm" id="showNamaPeng" value="<?php echo $data['firstname'], " ", $data['lastname']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="showTelpPeng">No Telepon</label>
                            <input type="number" name="showTelpPeng" class="form-control form-control-sm" id="showTelpPeng" value="<?php echo $data['no_hp']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="showAlamatPeng">Alamat</label>
                            <input type="text" name="showAlamatPeng" class="form-control form-control-sm" id="showAlamatPeng" value="<?php echo $data['alamat']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="showTglPeng">Tanggal Masuk</label>
                            <input type="date" name="showTglPeng" class="form-control form-control-sm" id="showTglPeng" value="<?php echo $data['tgl_masuk']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="showAsalKamPeng">Asal Kampus</label>
                            <input type="text" name="showAsalKamPeng" class="form-control form-control-sm" id="showAsalKamPeng" value="<?php echo $data['asal_kampus']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="showStatusPeng">Status</label>
                            <input type="text" name="showStatusPeng" class="form-control form-control-sm" id="showStatusPeng" value="<?php echo $data['status']; ?>" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>