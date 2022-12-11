<!-- //======================================================== TAMPILAN DATA TABEL DARI SQL ===================================================================================// -->
<?php
include 'database/config.php';

$sql = "SELECT * FROM `kamar` JOIN jenis_kamar ON kamar.id_jenis_kamar = jenis_kamar.id_jenis_kamar  ORDER BY `kamar`.`no_kamar` * 1 ASC;";
$hasil = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <tr>
        <td>
            <?php echo $data['no_kamar']; ?>
        </td>
        <td>
            <?php echo $data['id_user']; ?>
        </td>
        <td>
            <?php echo $data['id_jenis_kamar']; ?>
        </td>
        <td>
            <?php echo $data['keterangan']; ?>
        </td>
        <td>
            <?php echo $data['harga']; ?>
        </td>
        <th>
            <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#edit_data_kamar">
                <i class="bi-pencil" style="padding-right: 10px;"></i>Edit
            </button>
            <button class="btn btn-danger btn-xs">
                <i class="bi-trash" style="padding-right: 10px;"></i>Hapus
            </button>
            <button class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#detail_data_kamar">
                <i class="bi-info-circle-fill" style="padding-right: 10px;"></i>Detail
            </button>
        </th>
    </tr>
<?php
}
?>