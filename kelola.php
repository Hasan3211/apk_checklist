<!DOCTYPE html>

<?php
      include 'koneksi.php';

      $tanggal= "";
      $mesin='';
      $keterangan='';

      if(isset($_GET['ubah'])){
        $id_perawatan = $_GET['ubah'];

        $query = "SELECT * FROM tb_perawatan WHERE id_perawatan ='$id_perawatan';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

            $tanggal=$result['tanggal'];
            $mesin=$result['mesin'];
            $keterangan=$result['keterangan'];

            //var_dump($result);

            //die();

      }
      ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js" ></script>

    <title>belajar_crud</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">
      crud - arwana
    </a>
  </div>
</nav>
<div class="container">
<form method="POST" action="proses.php" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $id_perawatan; ?>" name="id_perawatan">

<div class="mb-3 row">
    <label for="Tanggal" class="col-sm-2 col-form-label">Tanggal</label>
    <div class="col-sm-10">
      <input type="date" name ="tanggal" class="form-control" id="Tanggal" placeholder="ex:12/12/2000" value="<?php echo $tanggal ?>">
    </div>
<script>
    // Fungsi untuk mendapatkan tanggal sekarang dalam format YYYY-MM-DD
    function getCurrentDate() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
    // Set input tanggal ke tanggal sekarang saat halaman dimuat
    document.getElementById('Tanggal').value = getCurrentDate();
</script>

  </div>
  <div class="mb-3 row">
    <label for="Mesin" class="col-sm-2 col-form-label">Mesin</label>
    <div class="col-sm-10">
      <input required type="text" name ="mesin"  class="form-control" id="Mesin" placeholder="ex:body" value="<?php echo $mesin ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Foto" class="col-sm-2 col-form-label">Foto before</label>
    <div class="col-sm-10">
        <input <?php if(!isset($_GET['ubah'])){echo "required";}?> class="form-control" type="file" name ="foto" id="Foto" accept="image/*">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Fotoafter" class="col-sm-2 col-form-label">Foto after</label>
    <div class="col-sm-10">
        <input <?php if(!isset($_GET['ubah'])){echo "";}?> class="form-control" type="file" name ="fotoafter" id="Fotoafter" accept="image/*">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Keterangan" class="col-sm-2 col-form-label">Keterangan</label>
    <div class="col-sm-10">
      <select required id="keterangan" name ="keterangan" class="form-select"  aria-label="Default select example">
          <option value="Rusak" <?php if($keterangan == 'rusak'){echo"selected";} ?>>Rusak</option>
          <option value="lancar" <?php if($keterangan == 'lancar'){echo"selected";} ?>>lancar</option>
        </select>
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col">
      <?php
      if(isset($_GET['ubah'])){
      ?>
        <button type="submit" name="aksi" value="edit" class="btn btn-primary">simpan perubahan</button>
      <?php
      } else {
      ?>
        <button type="submit" name="aksi" value="add" class="btn btn-primary">tambahkan</button>
      <?php
      }
      ?>
    <a href="index.php" type="button" class="btn btn-danger">batal</a>
  </div>
</div>
</div>
</form>
</div>
</body>
</html>