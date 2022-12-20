<?php

session_start();

if (!isset($_SESSION['username'])) {
    echo "<script type='text/javascript'>
        alert('Anda Belum Melakukan Login, Silahkan Login Terlebih Dahulu!');
        location = '../login/';
        </script>";
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>kostputri - Dashboard</title>
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
                            <li class="active">
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

                        <div class="modal fade" id="popup-logout" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="head-welcome-1">
                            <h1 class="head-title">
                                Welcome back, <?php echo $_SESSION['username'] ?>!
                            </h1>
                            <p class="head-subtitle">Anda punya beberapa notifikasi.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="main-content-inner">
                            <div class="card">
                                <div class="card-head-1 align-items-center">
                                    <h4 class="head-title-card fs-title">Pembayaran Terakhir</h4>
                                </div>
                                <br>
                                <br>
                                <div class="card-body-1">
                                    <div class="row-in">
                                        <div class="column-in">
                                            <p>Nama Penghuni 1</p>
                                        </div>
                                        <div class="column-text">
                                            <p>23-November 2022</p>
                                            <br>
                                            <p>Rp 350.000</p>
                                        </div>
                                        <br>
                                        <div class="column-in">
                                            <p>Nama Penghuni 2</p>
                                        </div>
                                        <div class="column-text">
                                            <p>24-November 2022</p>
                                            <br>
                                            <p>Rp 350.000</p>
                                        </div>
                                        <br>
                                        <div class="column-in">
                                            <p>Nama Penghuni 3</p>
                                        </div>
                                        <div class="column-text">
                                            <p>25-November 2022</p>
                                            <br>
                                            <p>Rp 350.000</p>
                                        </div>
                                        <br>
                                        <div class="column-in">
                                            <p>Nama Penghuni 4</p>
                                        </div>
                                        <div class="column-text">
                                            <p>26-November 2022</p>
                                            <br>
                                            <p>Rp 350.000</p>
                                        </div>
                                        <br>
                                        <div class="column-in">
                                            <p>Nama Penghuni 4</p>
                                        </div>
                                        <div class="column-text">
                                            <p>26-November 2022</p>
                                            <br>
                                            <p>Rp 350.000</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="calendar-container">
                            <div class="calendar">
                                <div class="year-header">
                                    <span class="left-button" id="prev"> &lang; </span>
                                    <span class="year" id="label"></span>
                                    <span class="right-button" id="next"> &rang; </span>
                                </div>
                                <table class="months-table">
                                    <tbody>
                                        <tr class="months-row">
                                            <td class="month">Jan</td>
                                            <td class="month">Feb</td>
                                            <td class="month">Mar</td>
                                            <td class="month">Apr</td>
                                            <td class="month">May</td>
                                            <td class="month">Jun</td>
                                            <td class="month">Jul</td>
                                            <td class="month">Aug</td>
                                            <td class="month">Sep</td>
                                            <td class="month">Oct</td>
                                            <td class="month">Nov</td>
                                            <td class="month">Dec</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="days-table">
                                    <td class="day">Sun</td>
                                    <td class="day">Mon</td>
                                    <td class="day">Tue</td>
                                    <td class="day">Wed</td>
                                    <td class="day">Thu</td>
                                    <td class="day">Fri</td>
                                    <td class="day">Sat</td>
                                </table>
                                <div class="frame">
                                    <table class="dates-table">
                                        <tbody class="tbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="main-content-inner">
                            <div class="card-info">
                                <?php
                                include 'database/config.php';
                                $pengaduan = mysqli_query($conn, "SELECT COUNT(id_pgd) AS jumlah_pengaduan FROM `pengaduan`;");
                                while ($hasil = mysqli_fetch_array($pengaduan)) {
                                ?>
                                    <div class="card-head align-items-center">
                                        <h4 class="head-title-card fs-info">Pengaduan</h4>
                                    </div>
                                    <br>
                                    <div class="card-body">
                                        <div class="col">
                                            <h3 class="text-inf f-w-info f-center">
                                                <?php
                                                echo $hasil['jumlah_pengaduan'];
                                                ?>
                                            </h3>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <br>
                            <br>
                            <div class="card-info">
                                <?php
                                include 'database/config.php';
                                $pemesanan = mysqli_query($conn, "SELECT COUNT(id_psn) AS jumlah_pemesanan FROM `pemesanan`;");
                                while ($hasil = mysqli_fetch_array($pemesanan)) {
                                ?>
                                    <div class="card-head align-items-center">
                                        <h4 class="head-title-card fs-info">Pemesanan</h4>
                                    </div>
                                    <br>
                                    <div class="card-body">
                                        <div class="col">
                                            <h3 class="text-inf f-w-info f-center">
                                                <?php
                                                echo $hasil['jumlah_pemesanan'];
                                                ?>
                                            </h3>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
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