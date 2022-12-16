<!-- //======================================================== TAMPILAN DATA TABEL DARI SQL ===================================================================================// -->
<?php
include 'database/config.php';

$sql = "SELECT * FROM pemesanan";
$hasil = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <div class="modal fade" id="detail_pemesanan<?php echo $data['id_psn']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Detail Pemesanan
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="">Id Pemesanan</label>
                            <input type="number" name="" class="form-control form-control-sm" id="" value="<?php echo $data['id_psn']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Jenis Kamar</label>
                            <input type="text" name="" class="form-control form-control-sm" id="" value="<?php echo $data['jenis_kamar_psn']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">No Kamar</label>
                            <input type="text" name="" class="form-control form-control-sm" id="" value="<?php echo $data['no_kamar_psn']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Nama Pemesan</label>
                            <input type="text" name="" class="form-control form-control-sm" id="" value="<?php echo $data['nama_psn']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Alamat Pemesan</label>
                            <input type="text" name="" class="form-control form-control-sm" id="" value="<?php echo $data['alamat_psn']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">No HP Pemesan</label>
                            <input type="number" name="" class="form-control form-control-sm" id="" value="<?php echo $data['no_hp_psn']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Lampiran KTP Pemesan</label>
                            <input type="image" name="" class="form-control form-control-sm" id="" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Tanggal Pemesanan</label>
                            <input type="date" name="" class="form-control form-control-sm" id="" value="<?php echo $data['tgl_psn']; ?>" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>