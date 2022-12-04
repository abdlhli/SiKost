<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>kostputri - Data Penghuni</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
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
            <div class="sidebar-header brand">KOST PUTRI</div>
            <div class="sidebar-user">
                <img src="img/46r.jpg" class="img-fluid rounded-circle mb-2" alt="...">
                <div class="fw-bold">Abdullah Ali</div>
                <small>Developer</small>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="">
                                <a href="index.html"><img src="img/home.png" width="24" height="24"></i>
                                    <span>Dashboard</span></a>
                            </li>
                            <li class="">
                                <a href="admin.html"><img src="img/setting.png" width="24" height="24">
                                    <span>Data Admin</span></a>
                            </li>
                            <li class="">
                                <a href="data_kamar.html"><img src="img/bed.png" width="24" height="24">
                                    <span>Data Kamar</span></a>
                            </li>
                            <li class="active">
                                <a href="data_penghuni.html"><img src="img/group.png" width="24" height="24">
                                    <span>Data Penghuni</span></a>
                            </li>
                            <li class="">
                                <a href="report.html"><img src="img/report.png" width="24" height="24">
                                    <span>Laporan Pembayaran</span></a>
                            </li>
                            <li class="">
                                <a href="pengaduan.html"><img src="img/alert.png" width="24" height="24">
                                    <span>Pengaduan</span></a>
                            </li>
                            <li class="">
                                <a href="booking.html"><img src="img/booking.png" width="24" height="24">
                                    <span>Pemesanan</span></a>
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
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="settings-btn">
                                <i class="bi-gear-fill"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="head-welcome-1">
                            <h1 class="head-title">Data Penghuni Kost</h1>
                        </div>
                    </div>
                </div>
                <div class="main-content-inner">
                    <div class="col-tb-1">
                        <div class="card-table">
                            <div class="card-body">
                                <div class="modal fade" id="tmb_data_penghuni" tabindex="-1"
                                    aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penghuni
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="">No Kamar</label>
                                                        <select class="form-select form-select-sm"
                                                            aria-label=".form-select-sm example">
                                                            <option selected>Pilih No Kamar</option>
                                                            <option value="1">Kamar No 1</option>
                                                            <option value="2">Kamar No 2</option>
                                                            <option value="3">Kamar No 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Nama Penghuni</label>
                                                        <input type="text" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Email</label>
                                                        <input type="email" name="" class="form-control form-control-sm"
                                                            placeholder="name@example.com" id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">No Telepon</label>
                                                        <input type="number" name=""
                                                            class="form-control form-control-sm" id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Tanggal Masuk</label>
                                                        <input type="date" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Alamat</label>
                                                        <input type="text" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Alamat</label>
                                                        <input type="text" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="edit_data_penghuni" tabindex="-1"
                                    aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Edit Data Penghuni
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="">No Kamar</label>
                                                        <select class="form-select form-select-sm"
                                                            aria-label=".form-select-sm example">
                                                            <option selected>Pilih No Kamar</option>
                                                            <option value="1">Kamar No 1</option>
                                                            <option value="2">Kamar No 2</option>
                                                            <option value="3">Kamar No 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Nama Penghuni</label>
                                                        <input type="text" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Email</label>
                                                        <input type="email" name="" class="form-control form-control-sm"
                                                            placeholder="name@example.com" id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">No Telepon</label>
                                                        <input type="number" name=""
                                                            class="form-control form-control-sm" id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Tanggal Masuk</label>
                                                        <input type="date" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Alamat</label>
                                                        <input type="text" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Alamat</label>
                                                        <input type="text" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="detail_data_penghuni" tabindex="-1"
                                    aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title fs-5" id="exampleModalLabel">Detail Data Penghuni
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="">No Kamar</label>
                                                        <select class="form-select form-select-sm"
                                                            aria-label=".form-select-sm example">
                                                            <option selected>Pilih No Kamar</option>
                                                            <option value="1">Kamar No 1</option>
                                                            <option value="2">Kamar No 2</option>
                                                            <option value="3">Kamar No 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Nama Penghuni</label>
                                                        <input type="text" name="" class="form-control form-control-sm"
                                                            id="" required readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Email</label>
                                                        <input type="email" name="" class="form-control form-control-sm"
                                                            placeholder="name@example.com" id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">No Telepon</label>
                                                        <input type="number" name=""
                                                            class="form-control form-control-sm" id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Tanggal Masuk</label>
                                                        <input type="date" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Alamat</label>
                                                        <input type="text" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label" for="">Alamat</label>
                                                        <input type="text" name="" class="form-control form-control-sm"
                                                            id="" required>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal"
                                                data-bs-target="#tmb_data_penghuni">
                                                <i class="bi-plus-lg">
                                                </i>Tambah Data</button>
                                            <table data-order="[]" id="tbl" class="display" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>No Kamar</th>
                                                        <th>Nama Penghuni</th>
                                                        <th>No Telepon</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include 'database/config.php';
                                                    $sql = "SELECT * FROM akun LEFT OUTER JOIN kamar ON akun.id_user = kamar.id_user WHERE `hak_akses` = 1 ORDER BY CASE WHEN kamar.no_kamar IS NULL THEN 1 ELSE 0 END , kamar.no_kamar ASC;";
                                                    $hasil = mysqli_query($conn, $sql);
                                                    while ($data = mysqli_fetch_array($hasil, MYSQLI_ASSOC)) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $data['no_kamar']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['firstname'], " ", $data['lastname']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['no_hp']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['tgl_masuk']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['status']; ?>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success btn-xs"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#edit_data_penghuni">
                                                                <i class="bi-pencil" style="padding-right: 10px;">
                                                                </i>Edit</button>
                                                            <button class="btn btn-danger btn-xs">
                                                                <i class="bi-trash" style="padding-right: 10px;"
                                                                    href="hapus.php?id=<?php echo $data['id_user']; ?>">
                                                                </i>Hapus</button>
                                                            <button class="btn btn-secondary btn-xs"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#detail_data_penghuni">
                                                                <i class="bi-info-circle-fill"
                                                                    style="padding-right: 10px;">
                                                                </i>Detail</button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

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