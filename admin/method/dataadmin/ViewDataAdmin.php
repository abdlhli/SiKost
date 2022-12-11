<!-- //======================================================== TAMPILAN DATA TABEL DARI SQL ===================================================================================// -->
<?php
include 'database/config.php';

$sql = "SELECT * FROM akun WHERE `hak_akses` = 0";
$hasil = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <tr>
        <td>
            <?php echo $data['id_user']; ?>
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
            <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#edit-admin"><i class="bi-pencil" style="padding-right: 10px;"></i>Edit
            </button>
            <button class="btn btn-danger btn-xs"><i class="bi-trash" style="padding-right: 10px;"></i>Hapus
            </button>
            <button class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#detail-admin">
                <i class="bi-info-circle-fill" style="padding-right: 10px;"></i>Detail
            </button>
        </th>
    </tr>
<?php
}
?>