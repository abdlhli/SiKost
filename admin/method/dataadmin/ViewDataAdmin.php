<!-- //======================================================== TAMPILAN DATA TABEL DARI SQL ===================================================================================// -->
<?php
include 'database/config.php';

$sql = "SELECT * FROM akun WHERE `hak_akses` = 0";
$count = 1;
$hasil = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <tr>
        <td>
            <?php echo $count++; ?>
        </td>
        <td>
            <?php echo $data['firstname'], " ", $data['lastname']; ?>
        </td>
        <td>
            <?php echo $data['no_hp']; ?>
        </td>
        <td>
            <?php echo $data['alamat']; ?>
        </td>
        <td>
            <?php echo $data['status']; ?>
        </td>
        <th>
            <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#edit_data_admin<?php echo $data['id_user']; ?>">
                <i class="bi-pencil" style="padding-right: 10px;"></i>Edit
            </button>
            <button class="btn btn-danger btn-xs">
                <i class="bi-trash" style="padding-right: 10px;"></i>Hapus
            </button>
            <button class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#detail_data_admin<?php echo $data['id_user']; ?>">
                <i class="bi-info-circle-fill" style="padding-right: 10px;"></i>Detail
            </button>
        </th>
    </tr>
<?php
}
?>