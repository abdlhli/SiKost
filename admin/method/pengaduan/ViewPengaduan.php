<!-- //======================================================== TAMPILAN DATA TABEL DARI SQL ===================================================================================// -->
<?php
include 'database/config.php';

$sql = "SELECT * FROM pengaduan";
$hasil = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
?>

    <tr>
        <td>
            <?php echo $data['id_pgd']; ?>
        </td>
        <td>
            <?php echo $data['nama_pgd']; ?>
        </td>
        <td>
            <?php echo $data['no_kamar_pgd']; ?>
        </td>
        <td>
            <?php echo $data['judul_pgd']; ?>
        </td>
        <th>
            <button class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#detail_pengaduan<?php echo $data['id_pgd']; ?>">
                <i class="bi-info-circle-fill" style="padding-right: 10px;"></i>Detail
            </button>
        </th>
    </tr>
<?php
}
?>