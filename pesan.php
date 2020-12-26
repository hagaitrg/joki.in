<?php
session_start();

include("function.php");

$db = new logic();

$img = $_GET['img'];

if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] === "joki") {
        echo
            "
            <script> 
                alert('Anda tidak dapat melakukan pemesanan');
                document.location.href = 'index.php';
            </script>
        ";
    } else if ($_SESSION['level'] === "customer") {
        $nama = $_SESSION['username'];
        $email = $_SESSION['email'];
    }
} else {
    echo
        "
    <script> 
        alert('Silahkan Login terlebih dahulu');
        document.location.href = 'login.php';
    </script>
";
}

if (isset($_POST['pesan'])) {
    if ($db->create($_POST) > 0) {
        echo
            "
        <script> 
            alert('Berhasil Input Pesanan');
            document.location.href = 'customer.php';
        </script>
    ";
    } else {
        echo mysqli_error($db->konek);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <title>Pesanan</title>
</head>

<body>
    <div class="row">
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-start">
                                <a href="index.php" class="text-light">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                    </svg> Home</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex justify-content-end">
                                <h6 class="text-light">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                                    </svg> <?= $nama ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-sm-6">
                        <img src="./assets/image/<?= $img ?>.jpg" class="card-img" height="530px">
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <h5 class="card-title text-center mt-3">Pesanan</h5>
                            <form class="ml-3" action="" method="post">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label"><b>Email</b></label>
                                    <div class="col-sm-8">
                                        <input type="email" readonly class="form-control-plaintext" name="email" value="<?= $email ?>">
                                        <small id="emailHelp" class="form-text text-muted">Kami tidak akan membocorkan data pribadi anda</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hp" class="col-sm-3 col-form-label"><b>No HP</b></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="hp">
                                    </div>
                                </div>
                                <?php
                                $paket = $_GET['paket'];
                                if ($paket == "tugasharian") {
                                    echo
                                        '
                                        <div class="form-group row">
                                            <label for="paket" class="col-sm-3 col-form-label"><b>Paket</b></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="paket" readonly value="Tugas Harian">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="durasi" class="col-sm-3 col-form-label"><b>Pengerjaan</b></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="durasi" readonly value="1 - 2hari">
                                            </div>
                                        </div>
                                        ';
                                } else if ($paket == "tugasbesar") {
                                    echo
                                        '
                                        <div class="form-group row">
                                            <label for="paket" class="col-sm-3 col-form-label"><b>Paket</b></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="paket" readonly value="Tugas Besar">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="durasi" class="col-sm-3 col-form-label"><b>Pengerjaan</b></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="durasi" readonly value="1.5 - 2 Bulan">
                                            </div>
                                        </div>
                                        ';
                                } else if ($paket == "tugasakhir") {
                                    echo
                                        '
                                        <div class="form-group row">
                                            <label for="paket" class="col-sm-3 col-form-label"><b>Paket</b></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="paket" readonly value="Tugas Akhir">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="durasi" class="col-sm-3 col-form-label"><b>Pengerjaan</b></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="durasi" readonly value="3.5 - 4 Bulan">
                                            </div>
                                        </div>
                                        ';
                                }
                                ?>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label"><b>Spesifikasi</b></label>
                                    <div class="col-sm-8">
                                        <textarea name="spek" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block rounded-pill" name="pesan">Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <small class="text-muted">&copy;Joki.in 2020</small>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/bootstrap.bundle.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>