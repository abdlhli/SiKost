<!-- //======================================================== MODAL TAMBAH DATA ===================================================================================// -->
<?php
$query = "SELECT * FROM `kamar`";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>
    <div class="modal fade" id="detail_data_kamar<?php echo $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="mb-3">
                            <label class="form-label" for="tmbjeniskamar">ID Jenis Kamar</label>
                            <select name="tmbjeniskamar" class="form-select form-select-sm" aria-label=".form-select-sm example">
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
                        </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" name="tmbdatakamar" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>