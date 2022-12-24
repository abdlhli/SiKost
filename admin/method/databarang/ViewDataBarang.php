<!-- //======================================================== TAMPILAN DATA TABEL DARI SQL ===================================================================================// -->
<?php
include 'database/config.php';

$sql = "SELECT * FROM `barang_tambahan`";
$count = 1;
$hasil = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <tr>
        <td>
            <?php echo $count++; ?>
        </td>
        <td>
            <?php echo $data['nama_barang']; ?>
        </td>
        <td>
            <?php echo $data['harga_barang']; ?>
        </td>
        <th>
            <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#edit_data_barang<?php echo $data['id_barang']; ?>">
                <i class="bi-pencil" style="padding-right: 10px;">
                </i>Edit</button>
            <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#hapus_data_barang<?php echo $data['id_barang']; ?>">
                <i class="bi-trash" style="padding-right: 10px;">
                </i>Hapus</button>
        </th>
    </tr>
<?php
}
?>