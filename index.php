<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Archivo+Black&display=swap" rel="stylesheet">
    <title>Joki.in</title>
    <style>
        .cari {
            background: transparent;
            border: none;
        }

        .joki {
            font-family: 'Fredoka One', cursive;
        }

        .jumbotron {
            background-image: url(./assets/image/jumbo-6.jpg);
            background-size: cover;
            display: block;
            top: 0;
            left: 0;
            /* position: absolute; */
            background-repeat: no-repeat;
            background-position: top;
            width: 100%;
            height: 100%;
            z-index: -1;
            padding: 200px;
        }

        .judul {
            font-family: 'Alfa Slab One', cursive;
            font-family: 'Archivo Black', sans-serif;
        }

        hr {
            height: 1px;
            border: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <a class="navbar-brand joki text-primary ml-5" href="welcome.html">Joki.in</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#paket">Packet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="input-group col-md-10">
                <input class="form-control py-2 border-right-0 border rounded-pill" type="search" placeholder="Search" id="example-search-input">
                <button class="btn my-2 my-sm-0" type="submit">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <?php if (!empty($_SESSION['level'])) : ?>
                <div class="dropdown mr-5">
                    <button class="btn dropdown-toggle text-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                        </svg> <?= $_SESSION['username'] ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if ($_SESSION['level'] == "joki") { ?>
                            <a class="dropdown-item" href="admin.php">Dashboard</a>
                        <?php } else if ($_SESSION['level'] === "customer") { ?>
                            <a class="dropdown-item" href="customer.php">Pesanan</a>
                        <?php } ?>
                        <a class="dropdown-item" href="logout.php">Log out</a>
                    </div>
                </div>
            <?php else : ?>
                <form class="form-inline my-2 my-lg-0 mr-5">
                    <a href="login.php"><button type="button" class="btn btn-outline-primary mr-1 rounded-pill">Login</button></a>
                    <a href="regis.php"><button type="button" class="btn btn-outline-dark ml-1 rounded-pill">Registrasi</button></a>
                </form>
            <?php endif; ?>
        </div>
    </nav>

    <div class="row">
        <div class="jumbotron jumbotron-fluid">
            <div class="container text-right" style="margin-top: 100px">
                <h1 class="display-4 text-light judul">
                    <strong>
                        Tugas jangan di bawa pusing serahkan saja kepada kami
                    </strong>
                </h1>
                <p class="lead text-light">
                    Perusahaan kami menyediakan jasa joki pengerjaan Tugas harian, Tugas Besar, dan Tugas Akhir.
                    Untuk versi pertama ini kami hanya memfokuskan kepada pengerjaan tugas web apps.
                </p>
                <a href="regis.php" class="btn btn-primary btn-lg active rounded-pill" role="button" aria-pressed="true">Mulai</a>
            </div>
        </div>
    </div>

    <div class="row" id="paket">
        <div class="container">
            <h1 class="text-primary text-center mb-5 judul">
                Our Services
                <hr class="bg-primary">
            </h1>
            <div class="row mb-5">
                <div class="col-sm-6">
                    <h1 class="display-4 text-primary">
                        <strong>
                            Paket Tugas Harian
                        </strong>
                    </h1>
                    <p class="lead">
                        Untuk pake tugas harian ini kami membandroll dengan harga Rp. 50.000 / task saja. Estimasi waktu
                        pengerjaannya dapat di hitung dengan jam.
                        Fasilitas yang kami tawarkan adalah Bootstrap Responsive Web, PHP Native, OOP PHP, dan database
                        MySQL.
                    </p>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow ml-5">
                        <img src="./assets/image/jumbo-2.jpg" class="card-img-top" width="80px" height="250px">
                        <div class="card-body">
                            <h5 class="card-title text-center">=== Tugas Harian ===</h5>
                            <p class="text-center">Rp 50.000/Task</p>
                        </div>
                        <a class="btn btn-primary rounded-pill ml-3 mr-3 mb-3 btn-sm" href="pesan.php?paket=<?php echo "tugasharian&img=jumbo-2" ?> " role="button">Pesan</a>
                        <div class="card-footer text-center text-muted">
                            Estimasi Pengerjaan 1 - 2 hari
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-sm-6 mt-5">
                    <div class="card shadow mr-5">
                        <img src="./assets/image/jumbo-3.jpg" class="card-img-top" width="80px" height="250px">
                        <div class="card-body">
                            <h5 class="card-title text-center">=== Tugas Besar ===</h5>
                            <p class="text-center">Rp 500.000/Task</p>
                        </div>
                        <a class="btn btn-primary rounded-pill ml-3 mr-3 mb-3 btn-sm" href="pesan.php?paket=<?php echo "tugasbesar&img=jumbo-3" ?>" role="button">Pesan</a>
                        <div class="card-footer text-center text-muted">
                            Estimasi Pengerjaan 1.5 bulan sampai 2 bulan
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-5">
                    <h1 class="display-4 text-primary">
                        <strong>
                            Paket Tugas Besar
                        </strong>
                    </h1>
                    <p class="lead">
                        Untuk pake tugas harian ini kami membandroll dengan harga Rp. 500.000 / task saja. Estimasi
                        waktu
                        pengerjaannya berkisar 1.5 bulan sampai 2 bulan.
                        Fasilitas yang kami tawarkan adalah Bootstrap Responsive Web, PHP MVC, OOP PHP, Laravel/Ci, dan
                        database
                        MySQL.
                    </p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-sm-6 mt-5">
                    <h1 class="display-4 text-primary">
                        <strong>
                            Paket Tugas Akhir
                        </strong>
                    </h1>
                    <p class="lead">
                        Untuk pake tugas harian ini kami membandroll dengan harga Rp. 2.000.000 / task saja. Estimasi
                        waktu
                        pengerjaannya berkisar 3.5 bulan sampai dengan 4 bulan.
                        Fasilitas yang kami tawarkan adalah Bootstrap Responsive Web, Framework, Rest API / Web
                        Scraping, dan Database MySQL.
                    </p>
                </div>
                <div class="col-sm-6 mt-5">
                    <div class="card shadow ml-5">
                        <img src="./assets/image/jumbo-4.jpg" class="card-img-top" width="80px" height="250px">
                        <div class="card-body">
                            <h5 class="card-title text-center">=== Tugas Akhir ===</h5>
                            <p class="text-center">Rp 2.000.000/Task</p>
                        </div>
                        <a class="btn btn-primary rounded-pill ml-3 mr-3 mb-3 btn-sm" href="pesan.php?paket=<?php echo "tugasakhir&img=jumbo-4" ?>" role="button">Pesan</a>
                        <div class="card-footer text-center text-muted">
                            Estimasi Pengerjaan 3.5 bulan sampai 4 bulan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" style="background-color: #e9ecef;">
        <div class="container">
            <div class="row mb-3">
                <div class="col-sm-8">
                    <h1 class="display-4 text-primary mt-5 judul">
                        <strong>
                            Dapatkan joki dengan teknologi terbaru
                        </strong>
                    </h1>
                    <p class="lead">
                        Sangat stress dan frustasi rasanya ketika kamu mengerjakan sebuah tugas yang tidak kamu mengerti
                        atau tidak passion, ditambah kamu tidak
                        mempunyai teman untuk bertanya. Dengan permasalahan demikian kami hadir untuk menyelesaikan
                        permasalahaan dengan tugas yang anda tidak minati.
                        Kami menawarkan jasa pembuatan web untuk Tugas Harian, Tugas Besar, dan Tugas Akhir.
                    </p>
                    <a href="https://en.wikipedia.org/wiki/Web_application" target="_blank"><button type="button" class="btn btn-primary btn-lg rounded-pill text-light">Kenalan</button></a>
                </div>
                <div class="col-sm-4">
                    <img src="./assets/image/jumbo-5.jpg" width="500px" height="350px" class="mt-5 ml-5 shadow p-3 mb-5 bg-white rounded">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-sm-2 mt-5">
                    <div class="d-flex justify-content-center">
                        <img src="./assets/image/mysql.png" width="50px" height="50px" class="text-center">
                    </div>
                    <p class="text-dark ml-3">Database MySQL</p>
                </div>
                <div class="col-sm-3 mt-5">
                    <div class="d-flex justify-content-center">
                        <img src="./assets/image/php.png" width="80pxpx" height="50px" class="text-center">
                    </div>
                    <p class="text-dark ml-3">Programming Language PHP</p>
                </div>
                <div class="col-sm-2 mt-5">
                    <div class="d-flex justify-content-center">
                        <img src="./assets/image/laravel.png" width="50pxpx" height="50px" class="text-center">
                    </div>
                    <p class="text-dark ml-3">Laravel Framework</p>
                </div>
                <div class="col-sm-2 mt-5">
                    <div class="d-flex justify-content-center">
                        <img src="./assets/image/api.png" width="50pxpx" height="50px" class="text-center">
                    </div>
                    <p class="text-dark ml-5">Rest API</p>
                </div>
                <div class="col-sm-2 mt-5">
                    <div class="d-flex justify-content-center">
                        <img src="./assets/image/scraping.png" width="50pxpx" height="50px" class="text-center">
                    </div>
                    <p class="text-dark ml-4">Sraping Option</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-5">
            <h3 class="mb-4 text-primary judul">Apa Kata Mereka</h3>
            <div class="card-deck">
                <div class="card shadow">
                    <img src="./assets/image/nadiem.jpg" class="card-img-top" width="210px" height="210px">
                    <div class="card-body bg-primary">
                        <h5 class="card-title text-center text-light">Nadiem diem</h5>
                        <p class="card-text text-light">"Saya sangat terbantu dengan adanya joki.in ini karena membantu
                            saya dalam
                            mengerjakan tugas pemrograman web saya, dimana saya tidak passion pada bidang tersebut"</p>
                    </div>
                </div>
                <div class="card shadow">
                    <img src="./assets/image/deddy.jpg" class="card-img-top" width="210px" height="210px">
                    <div class="card-body bg-primary">
                        <h5 class="card-title text-center text-light">Deddy Komputer</h5>
                        <p class="card-text text-light">"Sayang sekali saya baru tahu sekarang aplikasi ini, karena saya
                            sudah
                            sangat membutuhkan inovasi seperti ini."</p>
                    </div>
                </div>
                <div class="card shadow">
                    <img src="./assets/image/jack ma.jpg" class="card-img-top" width="210px" height="210px">
                    <div class="card-body bg-primary">
                        <h5 class="card-title text-center text-light">Jackmakie chan</h5>
                        <p class="card-text text-light">"Saya sangat senang dapat di bantu oleh joki.in harganya juga
                            pas di
                            kantong mahasiswa kok."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-primary" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mt-5 mb-5">
                    <div class="row">
                        <h1 class="text-light text-center mb-5 judul">
                            Hubungi Kami
                            <hr class="bg-light">
                        </h1>
                    </div>
                    <div class="row">
                        <p class="lead text-light">
                            Berikan kami pesan agar kami dapat membantu dan mempertimbangkan jika kami cocok dengan
                            bisnis
                            anda.
                        </p>
                        <form action="" method="post" class="col-sm-9">
                            <input type="text" class="form-control mb-3 col-sm-12" placeholder="Nama / Instansi">
                            <input type="Email" class="form-control mb-3" placeholder="Email">
                            <textarea class="form-control mb-5" id="exampleFormControlTextarea1" rows="3" placeholder="Pesan"></textarea>
                            <button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#exampleModal">Kirim</button>
                        </form>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Berhasil Mengirim Pesan</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-5 mt-5">
                    <div class="row">
                        <h1 class="text-light text-center mb-5 judul">
                            Lokasi Kami
                            <hr class="bg-light">
                        </h1>
                    </div>
                    <div class="row">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="bg-light">
        <div class="row">
            <div class="col-sm-9">

            </div>
            <div class="col-sm-3">
                <h5 class=" text-light joki mt-3 text-right mr-3">
                    &copy;Joki.in 2020
                </h5>
                <h6 class=" text-light text-right mr-3">
                    You are Logged in as <?= $_SESSION['username'] ?>
                </h6>
            </div>
        </div>
    </footer>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>