<!-- //======================================================== TAMPILAN DATA TABEL DARI SQL ===================================================================================// -->
<?php
include 'database/config.php';

$sql = "SELECT * FROM pengaduan";
$hasil = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>
    <div class="modal fade" id="detail_pengaduan<?php echo $data['id_pgd']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Detail Pengaduan
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="">ID Pengaduan</label>
                            <input type="number" name="" class="form-control form-control-sm" id="" value="<?php echo $data['id_pgd']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Nama</label>
                            <input type="text" name="" class="form-control form-control-sm" id="" value="<?php echo $data['nama_pgd']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">No Kamar</label>
                            <input type="number" name="" class="form-control form-control-sm" id="" value="<?php echo $data['no_kamar_pgd']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Judul</label>
                            <input type="text" name="" class="form-control form-control-sm" id="" value="<?php echo $data['judul_pgd']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Isi</label>
                            <textarea class="form-control" rows="3" readonly><?php echo $data['isi_pgd']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="">Lampiran</label>
                            <input type="text" name="" class="form-control form-control-sm" id="" value="<?php echo $data['lampiran_pgd']; ?>" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>