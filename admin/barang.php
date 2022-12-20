<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/");
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KostPutri - Data Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/metisMenu.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slicknav.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="css/typography.css">
    <link rel="stylesheet" href="css/default-css.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/calendar.css">

    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header brand">
                <img src="img/kost.png" class="img-fluid rounded-circle mb-2" alt="..." width="75px" height="40px">
                KOST PUTRI
            </div>
            <div class="sidebar-user">
                <img src="img/46r.jpg" class="img-fluid rounded-circle mb-2" alt="...">
                <div class="fw-bold"><?php echo $_SESSION['firstname'], " ", $_SESSION['lastname'] ?></div>
                <small>Developer</small>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="">
                                <a href="index.php"><img src="img/home.png" width="24" height="24"></i><span>Dashboard</span></a>
                            </li>
                            <li class="">
                                <a href="admin.php"><img src="img/setting.png" width="24" height="24"><span>Data
                                        Admin</span></a>
                            </li>
                            <li class="">
                                <a href="data_kamar.php"><img src="img/bed.png" width="24" height="24"><span>Data Kamar</span></a>
                            </li>
                            <li class="">
                                <a href="data_penghuni.php"><img src="img/group.png" width="24" height="24"><span>Data
                                        Penghuni</span></a>
                            </li>
                            <li class="">
                                <a href="report.php"><img src="img/report.png" width="24" height="24"><span>Laporan
                                        Pembayaran</span></a>
                            </li>
                            <li class="">
                                <a href="pengaduan.php"><img src="img/alert.png" width="24" height="24"><span>Pengaduan</span></a>
                            </li>
                            <li class="">
                                <a href="booking.php"><img src="img/booking.png" width="24" height="24"><span>Pemesanan</span></a>
                            </li>
                            <li class="active">
                                <a href="barang.php"><span>Barang</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content" style="min-height: 700px;">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li class="dropdown">
                                <i class="bi-bell-fill dropdown-toggle" data-toggle="dropdown">
                                    <span>2</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view
                                            all</a></span>
                                    <div class="nofity-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="bi-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="bi-chat-text btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <i class="bi-gear-fill dropdown-toogle" data-toggle="dropdown"></i>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a data-bs-toggle="modal" data-bs-target="#popup-logout" class="bi-box-arrow-right">
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <div class="modal fade" id="popup-logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">PERINGATAN !!</h5>
                                    </div>
                                    <div class="modal-body">
                                        <span>Apakah anda yakin ingin logout?</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-xs" data-bs-dismiss="modal">Cancel</button>
                                        <a class="btn btn-danger btn-xs" href="logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-title-area">
                <div class="row lign-items-center">
                    <div class="col-sm-6">
                        <div class="head-welcome-1">
                            <h1 class="head-title">Data Barang</h1>
                        </div>
                    </div>
                </div>
                <div class="main-content-inner">
                    <div class="col-tb-1">
                        <div class="card-table">
                            <div class="card-body">
                                <div class="modal fade" id="tmb_data_penghuni" tabindex="-1" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pembayaran
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col">
                                                            <label class="control-label" for="tmbNamaDepanPeng">Nama
                                                                Depan</label>
                                                            <input type="text" name="tmbNamaDepanPeng" class="form-control form-control-sm" id="tmbNamaDepanPeng" required>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label class="control-label" for="tmbNamaBelakangPeng">Nama
                                                                belakang</label>
                                                            <input type="text" name="tmbNamaBelakangPeng" class="form-control form-control-sm" id="tmbNamaBelakangPeng">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="tmbTelpPeng">No
                                                            Telepon</label>
                                                        <input type="number" name="tmbTelpPeng" class="form-control form-control-sm" id="tmbTelpPeng" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="tmbAlamatPeng">Alamat</label>
                                                        <input type="text" name="tmbAlamatPeng" class="form-control form-control-sm" id="tmbAlamatPeng" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="tmbTglPeng">Tanggal
                                                            Masuk</label>
                                                        <input type="date" name="tmbTglPeng" class="form-control form-control-sm" id="tmbTglPeng" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="tmbAsalKamPeng">Asal
                                                            Kampus</label>
                                                        <input type="text" name="tmbAsalKamPeng" class="form-control form-control-sm" id="tmbAsalKamPeng" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="tmbStatusPeng">Status</label>
                                                        <select name="tmbStatusPeng" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                            <option selected>Pilih Status Penghuni</option>
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="tmbdatapenghuni" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="detail_laporan" tabindex="-1" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Detail Laporan</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Id Pembayaran</label>
                                                        <input type="number" name="" class="form-control form-control-sm" id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Tanggal Pembayaran</label>
                                                        <input type="date" name="" class="form-control form-control-sm" id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Foto Kuitansi</label>
                                                        <input type="text" name="" class="form-control form-control-sm" id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Id User</label>
                                                        <input type="number" name="" class="form-control form-control-sm" id="" required>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#tmb_data_penghuni">
                                                <i class="bi-plus-lg">
                                                </i>Tambah Data</button>
                                            <table id="tbl" class="display" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ID Pembayaran</th>
                                                        <th>Tanggal Pembayaran</th>
                                                        <th>Foto Kuitansi</th>
                                                        <th>ID User</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>001</td>
                                                        <td>06-12-2022</td>
                                                        <td>...</td>
                                                        <td>01</td>
                                                        <th> <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#edit_data_penghuni<?php echo $data['id_user']; ?>">
                                                                <i class="bi-pencil" style="padding-right: 10px;">
                                                                </i>Edit</button>
                                                            <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#hapus_data_penghuni<?php echo $data['id_user']; ?>">
                                                                <i class="bi-trash" style="padding-right: 10px;">
                                                                </i>Hapus</button>
                                                            <button class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#detail_laporan">
                                                                <i class="bi-info-circle-fill" style="padding-right: 10px;"></i>Detail</button>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>002</td>
                                                        <td>06-12-2022</td>
                                                        <td>...</td>
                                                        <td>01</td>
                                                        <th> <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#edit_data_penghuni<?php echo $data['id_user']; ?>">
                                                                <i class="bi-pencil" style="padding-right: 10px;">
                                                                </i>Edit</button>
                                                            <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#hapus_data_penghuni<?php echo $data['id_user']; ?>">
                                                                <i class="bi-trash" style="padding-right: 10px;">
                                                                </i>Hapus</button>
                                                            <button class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#detail_laporan">
                                                                <i class="bi-info-circle-fill" style="padding-right: 10px;"></i>Detail</button>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>003</td>
                                                        <td>06-12-2022</td>
                                                        <td>...</td>
                                                        <td>01</td>
                                                        <th> <button class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#edit_data_penghuni<?php echo $data['id_user']; ?>">
                                                                <i class="bi-pencil" style="padding-right: 10px;">
                                                                </i>Edit</button>
                                                            <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#hapus_data_penghuni<?php echo $data['id_user']; ?>">
                                                                <i class="bi-trash" style="padding-right: 10px;">
                                                                </i>Hapus</button>
                                                            <button class="btn btn-secondary btn-xs" data-bs-toggle="modal" data-bs-target="#detail_laporan">
                                                                <i class="bi-info-circle-fill" style="padding-right: 10px;"></i>Detail</button>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/calendar.js"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="js/line-chart.js"></script>
    <script src="js/pie-chart.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/scripts.js"></script>

    <!-- Script Tabel + Modal -->
    <script src="js/tabel.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="js/modal.js"></script>
</body>

</html>