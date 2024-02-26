<?php
include 'koneksi.php';

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$query = "SELECT * FROM tb_perawatan";

if (!empty($start_date) && !empty($end_date)) {
    $query .= " WHERE tanggal BETWEEN '$start_date' AND '$end_date'";
}

$query .= ";";

$sql = mysqli_query($conn, $query);
$no = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <title>belajar_crud</title>
<style>
  #dt {
    text-align: center;
  }
  #dt th, #dt td {
    text-align: center;
  }
</style>
</head>
<body>
<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">
      Checklist
    </a>
    <?php
    if(isset($_GET['pesanm'])){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Login Berhasil!</strong> <?php echo $_GET['pesanm'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
    <form class="form-inline">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Cari" aria-label="Search" id="search-input">
        <div class="input-group-append">
        </div>
      </div>
    </form>
  </div>
</nav>
<div class="container">
  <h1 class="mt-3">Data dan Gambar</h1>
  <figure>
    <blockquote class="blockquote">
      <p>Berisi Database</p>
    </blockquote>
    <figcaption class="blockquote-footer">
      CRUD <cite title="Source Title">Create Read Update</cite>
    </figcaption>
  </figure>
  <div class="row">
    <div class="col">
      <a href="kelola.php" type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
  </svg> Tambah Data</a>
      <a href="cetak.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
  </svg> Cetak</a>
    
  <!--  tombol tanggal 
    
    </div>
    <div class="col-6 text-right">
      <form method="GET">
        <div class="form-row mt-3">
          <div class="col">
            <input type="date" class="form-control" name="start_date" placeholder="Dari Tanggal">
          </div>
          <div class="col">
            <input type="date" class="form-control" name="end_date" placeholder="Hingga Tanggal">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark mt-2 float-right">Filter</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  --> 
  <div class="table-responsive mt-3">
    <table id="dt" class="table align-middle table-hover cell-border">
      <thead>
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Mesin</th>
          <th>Foto Before</th>
          <th>Foto After</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($result = mysqli_fetch_assoc($sql)) {
        ?>
        <tr>
          <td width='3%'><?php echo ++$no; ?></td>
          <td><?php echo $result['tanggal']; ?></td>
          <td><?php echo $result['mesin']; ?></td>
          <td>
            <img src="img/<?php echo $result['foto']; ?>" style="width: 70px;">
          </td>
          <td>
            <img src="img/<?php echo $result['fotoafter']; ?>" style="width: 70px;">
          </td>
          <td><?php echo $result['keterangan']; ?></td>
          <td>
            <a href="kelola.php?ubah=<?php echo $result['id_perawatan']; ?>" type="button" class="btn btn-success btn-sm">ubah</a>
            <a href="proses.php?hapus=<?php echo $result['id_perawatan']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data')">hapus</a>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<script>
$(document).ready(function () {
    var table = $('#dt').DataTable();
    $('#search-button').click(function () {
        table.search($('#search-input').val()).draw();
    });
});
</script>

</body>
</html>
