<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Cetak Data dan Gambar</title>
</head>
<body>
    <div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-4">
    <?php
    if(isset($_GET['pesan'])){
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Login Gagal!</strong> <?php echo $_GET['pesan'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <div class="card">
            <div class="card-header text-center">
                halaman login
            </div>
            <form action="proses_login.php" method="post">
                <div class="card-body">
                    <label for="username" class="form-label">username</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="masukan username" aria-describedby="basic-addon3 basic-addon4">
                    </div>
                    <label for="password" class="form-label">password</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                            </svg>
                        </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="masukan password" aria-describedby="basic-addon3 basic-addon4">
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary" name="btnlogin">login</button>
                    </div>
                    <div class="text-center">
                        belum punya akun, silahkan <a href="registrasinew.php">Daftar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</body>
</html>
