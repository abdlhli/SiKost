<!-- //======================================================== TAMPILAN DATA TABEL DARI SQL ===================================================================================// -->
<?php
include 'database/config.php';

$sql = "SELECT * FROM `pembayaran` JOIN akun ON pembayaran.id_user = akun.id_user JOIN kamar ON akun.no_kamar = kamar.no_kamar;";
$count = 1;
$hasil = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <tr>
        <td>
            <?php echo $count++; ?>
        </td>
        <td>
            <?php echo $data['id_pembayaran']; ?>
        </td>
        <td>
            <?php echo $data['firstname'], " ", $data['lastname']; ?>
        </td>
        <td>
            <?php echo $data['kamar']; ?>
        </td>
        <td>
            <?php echo $data['tgl_pembayaran']; ?>
        </td>
        <td>
            <?php echo $data['harga_kamar']; ?>
        </td>
        <td align="">
            <?php
            if (empty($data['foto_kuitansi'])) {
                echo 'Kuitansi Kosong';
            } else {
            ?>
                <a href="#" data-toggle="modal" data-target="#showgambar<?php echo $data['id_pembayaran']; ?>">
                    <img src="../file/kuitansi/<?php echo $data['foto_kuitansi']; ?>" alt="..." width="150px">
                </a>
            <?php
            }
            ?>


            <div id="showgambar<?php echo $data['id_pembayaran']; ?>" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img src="../file/kuitansi/<?php echo $data['foto_kuitansi']; ?>" alt="..." width="100%" height="100%">
                        </div>
                    </div>
                </div>
            </div>

        </td>
        <td>
            <?php echo $data['status_pembayaran']; ?>
        </td>
        <th>
            <?php
            if ($data['status_pembayaran'] == "Lunas") {
                // Jika status adalah "Lunas", maka tidak menampilkan tombol edit
            } else {
                // Jika status bukan "Lunas", maka menampilkan tombol edit
            ?>
                <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#edit_data_pembayaran<?php echo $data['id_pembayaran']; ?>">
                    <i class="bi-pencil" style="padding-right: 10px;">
                    </i>Ubah Menjadi Lunas</button>
            <?php
            }
            ?>
            <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#hapus_data_pembayaran<?php echo $data['id_pembayaran']; ?>">
                <i class="bi-trash" style="padding-right: 10px;">
                </i>Hapus</button>
            <!-- <button class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#detail_pembayaran">
                <i class="bi-info-circle-fill" style="padding-right: 10px;"></i>Detail</button> -->
        </th>
    </tr>
<?php
}
?>