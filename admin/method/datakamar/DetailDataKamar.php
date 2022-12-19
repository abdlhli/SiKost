<?php
$query = "SELECT * FROM `kamar` JOIN jenis_kamar ON kamar.id_jenis_kamar = jenis_kamar.id_jenis_kamar;";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>
    <div class="modal fade" id="detail_data_kamar<?php echo $data['no_kamar']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Detail Data Kamar
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="tmbnokamar">No Kamar</label>
                            <input type="text" name="tmbnokamar" class="form-control form-control-sm" id="" value="<?php echo $data['no_kamar']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tmbnokamar">Keterangan Kamar</label>
                            <input type="text" name="tmbnokamar" class="form-control form-control-sm" id="" value="<?php echo $data['keterangan']; ?>" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>