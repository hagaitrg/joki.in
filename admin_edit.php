<?php
session_start();
include("function.php");
$db = new logic();


if ($_SESSION['level'] !== "joki") {
    header("Location:alert.html");
}

$id = $_GET['id'];

if (!is_null($id)) {
    $data = $db->get_id($id);
} else {
    echo
        "
    <script> 
        alert('Gagal Mendapatkan Id');
        document.location.href = 'admin.php';
    </script>
";
}

if (isset($_POST['edit'])) {
    $id = $_POST['id_pesanan'];
    $status = $_POST['status'];

    $cek = $db->edit($id, $status);
    if ($cek > 0) {
        echo
            "
            <script> 
                alert('Berhasil Update Data');
                document.location.href = 'admin.php';
            </script>
        ";
    } else {
        "
        <script> 
            alert('Gagal Update Data');
            document.location.href = 'admin.php';
        </script>
    ";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Edit Data</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand  ml-5" href="index.php" style="font-family: 'Fredoka One', cursive;">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="order_admin.php">Edit Data <span class="sr-only">(current)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Data Tables</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="dropdown mr-5">
            <button class="btn dropdown-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg> <?= $_SESSION['username']; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="logout.php">Log out</a>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg> Edit Data
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="" method="post" class="ml-5 mr-5">
                            <input type="hidden" name="id_pesanan" value="<?= $data['id'] ?>">
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" readonly class="form-control" name="email" value="<?= $data['email'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Paket</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control" name="paket" value="<?= $data['paket'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Detail</label>
                                <div class="col-sm-10">
                                    <textarea type="text" readonly class="form-control" name="detail" rows="3"><?= $data['spesifikasi']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="status" value="<?= $data['status'] ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="edit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>