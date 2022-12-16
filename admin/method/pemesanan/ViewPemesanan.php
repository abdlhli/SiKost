<!-- //======================================================== TAMPILAN DATA TABEL DARI SQL ===================================================================================// -->
<?php
include 'database/config.php';

$sql = "SELECT * FROM pemesanan";
$hasil = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <tr>
        <td>
            <?php echo $data['id_psn']; ?>
        </td>
        <td>
            <?php echo $data['jenis_kamar_psn']; ?>
        </td>
        <td>
            <?php echo $data['no_kamar_psn']; ?>
        </td>
        <td>
            <?php echo $data['nama_psn']; ?>
        </td>
        <td>
            <?php echo $data['alamat_psn']; ?>
        </td>
        <td>
            <?php echo $data['no_hp_psn']; ?>
        </td>
        <th>
            <button class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#detail_pemesanan<?php echo $data['id_psn']; ?>">
                <i class="bi-info-circle-fill" style="padding-right: 10px;"></i>Detail
            </button>
        </th>
    </tr>
<?php
}
?>