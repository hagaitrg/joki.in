<?php
include("function.php");
$db = new logic();

if (isset($_POST['register'])) {
    if ($db->registrasi($_POST) > 0) {
        echo
            "
            <script> 
                alert('Berhasil Registrasi');
                document.location.href = 'login.php';
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
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <title>Registrasi</title>
    <style>
        h6 {
            font-family: 'Fredoka One', cursive;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card shadow" style="margin-top: 130px;">
            <div class="row no-gutters">
                <div class="col-sm-6 bg-secondary">
                    <div class="card-body">
                        <a href="index.php">
                            <button type="submit" class="btn btn-light btn-sm rounded-pill text-secondary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                </svg> Back
                            </button>
                        </a>
                        <div class="d-flex justify-content-center">
                            <h6 class="display-4 text-light" style="margin-top: 250px;">
                                <strong>
                                    Joki.in
                                </strong>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-body">
                        <center>
                            <img src="./assets/image/wad.jpg" width="250px" height="250px">
                        </center>
                        <form class="ml-5 mb-5" action="" method="post">
                            <h5 class="card-title">Registrasi</h5>
                            <div class="form-group">
                                <input type="text" class="form-control col-sm-10" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control col-sm-10" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control col-sm-10" name="level" required>
                                    <option value="customer">Customer</option>
                                    <option value="joki">Joki</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control col-sm-10" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control col-sm-10" name="password2" placeholder="Konfirmasi Password" required>
                            </div>
                            <button type="submit" class="btn btn-secondary btn-block col-sm-10 rounded-pill" name="register">Registrasi</button>
                            <p class="mt-3">Sudah memiliki akun ? <a href="login.php">Login</a></p>
                        </form>
                        <div class="d-flex justify-content-end">
                            <small class="text-muted">&copy; Joki.in 2020</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/bootstrap.bundle.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>