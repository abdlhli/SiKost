<?php
include '../database/config.php';

if (isset($_POST['tmbdatapenghuni'])) {
    $tmbNoKamarPeng = $_POST['no_kamar'];
    $tmbNamaDepanPeng = $_POST['firstname'];
    $tmbNamaBelakangPeng = $_POST['lastname'];
    $tmbTelpPeng = $_POST['no_telp'];
    $tmbAlamatPeng = $_POST['alamat'];
    $tmbTglPeng = $_POST['tgl_masuk'];
    $tmbAsalKamPeng = $_POST['asal_kampus'];
    $tmbStatusPeng = $_POST['status'];

    $querry = "INSERT INTO `akun` (`id_user`, `firstname`, `lastname`, `pass`, `username`, `no_hp`, `alamat`, `tgl_masuk`, `foto_profile`, `asal_kampus`, `hak_akses`, `status`) 
    VALUES ('','$tmbNamaDepanPeng','$tmbNamaBelakangPeng','123','','$tmbTelpPeng','$tmbAlamatPeng','$tmbTglPeng','','$tmbAsalKamPeng','1','$tmbStatusPeng');";

    $querry_run = mysqli_query($conn, $querry);

    if ($querry_run) {
        echo '<script> alert("Data Tersimpan"); </script>';
        header('Location: ../Data_penghuni.php');
    } else {
        echo '<script> alert("Data Tidak Tersimpan"); </script>';
    }
}
?>