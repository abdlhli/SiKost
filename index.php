<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Kost Putri Jawa - 48</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">
                <img src="assets/img/kost.png" class="img-fluid rounded-circle mb-2" alt="kost" width="40px" height="20px">
                Kost Putri 48</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#info">Info Ketersediaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#hubungi-kami">Hubungi Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="login/">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead -->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Kost Putri Jawa - 48</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- Tentang -->
    <section class="about-section text-center" id="tentang">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">Tentang Kami</h2>
                    <p class="text-white">
                        Kost Putri Jawa 48 adalah sebuah jasa yang menawarkan sebuah kamar atau tempat untuk ditinggali
                        dengan sejumlah pembayaran tertentu untuk setiap periode tertentu (umumnya pembayaran perbulan),
                        Kost Putri Jawa 48 sendiri memiliki 2 jenis kamar yang tersedia, yaitu Kamar dengan Kamar Mandi
                        Dalam, dan Kamar dengan Kamar Mandi Luar. Kost ini terletak di kota Jember tepatnya dijalan Jawa
                        No.48 dekat dengan kampus UNEJ. <br><br>
                        Pemesanan Kamar Dapat Dilakukan Melalui Aplikasi Kost Kami Dengan Mendownload Melalui Link
                        Dibawah Website atau Dapat Klik
                        <a href="#linkdownload">Disini.</a>
                    </p>
                    <br>
                </div>
                <br><br><br>
            </div>
        </div>
    </section>
    <!-- Ketersediaan -->

    <?php
    include 'login/database/config.php';
    $kamar_kosong = mysqli_query($conn, "SELECT COUNT(kamar.status_kmr)-1 AS kamar_kosong FROM `kamar`;");
    while ($hasil = mysqli_fetch_array($kamar_kosong)) {
    ?>

        <section class="projects-section bg-light" id="info">
            <div class="container px-4 px-lg-5">
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-door text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">--= Ketersediaan Kamar =--</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="medium text-black-50">
                                Tersedia
                                <?php
                                echo $hasil['kamar_kosong'];
                                ?>
                                kamar kosong
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php
    }
    ?>
    <!-- Foto Kamar -->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5">
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7">
                    <img class="img-fluid" src="assets\img\depankos.png" />
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Kost Putri Jawa 48</h4>
                        <p class="text-black-50 mb-0">Berikut ini beberapa foto foto atau gambar dari Kost Putri.</p>
                    </div>
                </div>
            </div>
            <!-- Foto Kamar Slide -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/kamar/foto2.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Parkir</h5>
                            <p>Foto Sebagian Lahan Parkir Motor dan kamar.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/kamar/foto3.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Kamar Atas</h5>
                            <p>Foto Sebagian Kamar Di Lt.2 Pada Kost Putri Jawa 48.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/kamar/foto4.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Dapur</h5>
                            <p>Foto Dapur Yang Dapat Digunakan Untuk Penghuni Kost Putri Jawa 48.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/kamar/foto5.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Kamar</h5>
                            <p>Salah Satu Foto Kamar Yang Ada Pada Kost Putri Jawa 48.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button text-center" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Detail Fasilitas Kost
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <strong>Beberapa Fasilitas Pada Kost.</strong><br>
                            <p class="ukuran-teks-kecil">
                                ● FREE WIFI <br>
                                ● Air Sanyo <br>
                                ● Listrik <br>
                                ● Tempat Parkir Motor <br>
                                ● Tempat Cuci Baju <br>
                                ● Tempat Jemuran <br>
                                ● Alat Setrika Bersama<br>
                                ● Kulkas Bersama <br>
                                ● Dapur Bersama, Dilengkapi Kompor Gas, Tabung LPG<br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Detail Fasilitas Kamar Kost
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <strong>Beberapa Fasilitas Kamar Kost.</strong><br>
                            <p class="ukuran-teks-kecil">
                                ● Tempat Tidur Beserta Kasur <br>
                                ● Lemari <br>
                                ● Meja Belajar <br>
                                ● Kamar Mandi Dalam ( Untuk Pilihan Kamar Dengan Kamar Mandi Dalam ) <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hubungi Kami-->
    <section class="signup-section" id="hubungi-kami">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-black"></i>
                    <h2 class="text-black mb-5">Kunjungi Kami atau Dapat Melakukan Pemesanan Melalui Aplikasi Kami</h2>
                    <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3237414962473!2d113.71510481486553!3d-8.170102794119515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6958b6a886429%3A0xfad4c53259737eb!2sKost%20Putri%20Jawa%2048!5e0!3m2!1sen!2sid!4v1668953292928!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Review Google Maps -->
    <section class="projects-section bg-light" id="info">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="google-review">
                <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-3fdf3ca5-ebba-41d4-a048-a1edd84b3860"></div>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <section class="contact-section">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Alamat</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">Jl. Jawa No.48, Tegal Boto Lor, Sumbersari, Kec.
                                Sumbersari, Kabupaten Jember, Jawa Timur 68121
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-download text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Download</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">Download Aplikasi Untuk Melakukan Pemesanan Kost Melalui
                                Link Dibawah Ini
                            </div>
                            <div class="small text-black-50"><a href="#!" id="linkdownload">Link Download App</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Instagram</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">Untuk Dapat Melihat Foto Ataupun Video Penginapan Dengan
                                Jelas dan Lengkap dapat mengakses Instagram Melalui link Dibawah Ini
                            </div>
                            <div class="small text-black-50"><a href="https://www.instagram.com/kost_putri_jawa48_jember/">Link Instagram</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer small text-center text-white-50">
        <div class="container px-4 px-lg-5"></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>