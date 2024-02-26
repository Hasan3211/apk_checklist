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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Cetak Data dan Gambar</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-3">Cetak Data dan Gambar</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi Database</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Read Update</cite>
            </figcaption>
        </figure>
        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <tr>
                    <th><center>No.</center></th>
                    <th><center>Tanggal</center></th>
                    <th><center>Mesin</center></th>
                    <th><center>Foto Before</center></th>
                    <th><center>Foto After</center></th>
                    <th><center>Keterangan</center></th>
                </tr>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                        ?>
                        <tr>
                            <td><center><?php echo ++$no; ?></center></td>
                            <td><center><?php echo $result['tanggal']; ?></center></td>
                            <td><center><?php echo $result['mesin']; ?></center></td>
                            <td><center><img src="img/<?php echo $result['foto']; ?>" style="width: 100px;"></center></td>
                            <td><center><img src="img/<?php echo $result['fotoafter']; ?>" style="width: 100px;"></center></td>
                            <td><center><?php echo $result['keterangan']; ?></center></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
    window.print();
    window.onafterprint = function() {
        var printData = "Data cetakan yang ingin disimpan"; // Gantilah dengan data cetakan yang ingin Anda simpan
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_print.php', true);
        xhr.send('printData=' + encodeURIComponent(printData));

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle respon dari server di sini, misalnya, tampilkan pesan sukses/kesalahan
                console.log(xhr.responseText);
                // Redirect ke halaman lain jika diperlukan
                window.location.href = 'index.php';
            }
        };
    }
</script>   
</body>
</html>
