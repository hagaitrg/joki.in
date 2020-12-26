<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "wad");

if (isset($_COOKIE['isLogin'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    header("Location:index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    $login = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($login) > 0) {
        $data = mysqli_fetch_assoc($login);
        if (password_verify($pwd, $data['password'])) {
            if ($data['level'] == "joki") {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $data['email'];
                $_SESSION['level'] = "joki";
                if (isset($_POST['ingat'])) {
                    setcookie('isLogin', 'true', time() + 120);
                }
                header("Location:admin.php");
            } else if ($data['level'] == "customer") {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $data['email'];
                $_SESSION['level'] = "customer";
                if (isset($_POST['ingat'])) {
                    setcookie('isLogin', 'true', time() + 120);
                }
                header("Location:index.php");
            }
        }
    }

    $error = true;
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
    <title>Login</title>
    <style>
        h6 {
            font-family: 'Fredoka One', cursive;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card shadow" style="margin-top: 150px;">
            <div class="row no-gutters">
                <div class="col-sm-6 bg-primary">
                    <div class="card-body">
                        <a href="index.php">
                            <button type="submit" class="btn btn-light btn-sm rounded-pill text-primary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                </svg> Back
                            </button>
                        </a>
                        <div class="d-flex justify-content-center">
                            <h6 class="display-4 text-light" style="margin-top: 200px;">
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
                            <h5 class="card-title">Sign in</h5>
                            <?php if (isset($error)) : ?>
                                <p class="text-danger">Username/Passowrd Salah!</p>
                            <?php endif; ?>
                            <div class="form-group">
                                <input type="text" class="form-control col-sm-10" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control col-sm-10" name="password" placeholder="password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="ingat">
                                <label class="form-check-label" for="ingat">Ingat Saya</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block col-sm-10 rounded-pill" name="login">Login</button>
                            <p class="mt-3">Belum memiliki akun ? <a href="regis.php">Registrasi</a></p>
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