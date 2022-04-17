<?php
session_start();
require '_includes/db.php';
require 'function/function.php';
$cek = null;
if (!empty($_GET)) {
    $id = $_GET['idUbah'];
    $dataAnggota = query("SELECT * FROM anggota WHERE id='$id'");
    $dataAnggota = $dataAnggota[0];
}
if (!empty($_POST)) {
    $id = $_GET['idUbah'];
    $cek = ubahAnggota($_POST, $id);
    $dataAnggota = query("SELECT * FROM anggota WHERE id='$id'");
    $dataAnggota = $dataAnggota[0];
}
if (isset($_SESSION['is_login'])) {
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendafaran UKM MANCING</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="dasbor.php" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="images/himatif_6000_small.png" alt="Logo" class="img-fluid" style="width: 5%;">
                    <span class="fs-4">UKM XYZ</span>
                </a>

                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a class="py-2 text-dark text-decoration-none" href="logout.php">Logout</a>
                </nav>
            </div>
        </header>
    </div>
    <?php if ($cek > 0) : ?>
        <div class="row col-md-5 mx-auto mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>

            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    Data Anggota Berhasil Diubah
                </div>
            </div>
        </div>
    <?php endif ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-8 mx-auto">
                <form action="" method="POST">
                    <h1 class="h1">Form Ubah Anggota UKM MANCING</h1>

                    <div class="mb-3">
                        <label for="input-nama" class="form-label">Nama:</label>
                        <input value="<?= $dataAnggota->nama ?>" type="text" name="nama" id="input-nama" class="form-control" required="required">
                    </div>

                    <div class="mb-3">
                        <label for="input-npm" class="form-label">NPM:</label>
                        <input value="<?= $dataAnggota->npm ?>" type="text" name="npm" id="input-npm" class="form-control" required="required">
                    </div>

                    <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">

                </form>
                <a class="btn btn-warning" href="dasbor.php?">Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>