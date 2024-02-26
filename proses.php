<?php
include 'koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {
        $tanggal = $_POST['tanggal'];
        $mesin = $_POST['mesin'];
        $keterangan = $_POST['keterangan'];
        $foto = $_FILES['foto']['name'];
        $fotoafter = $_FILES['fotoafter']['name']; // Perubahan disini

        $dir = "img/";
        $tmpFile = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmpFile, $dir . $foto);

        $dir = "img/";
        $tmpFile = $_FILES['fotoafter']['tmp_name']; // Perubahan disini
        move_uploaded_file($tmpFile, $dir . $fotoafter); // Perubahan disini

        $query = "INSERT INTO tb_perawatan VALUES(null, '$tanggal', '$mesin', '$foto', '$keterangan', '$fotoafter')"; // Perubahan disini
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            header("location: index.php");
        } else {
            echo $query;
        }
    } else if ($_POST['aksi'] == "edit") {
        echo "edit data <a href='index.php'>[home]</a>";

        $id_perawatan = $_POST['id_perawatan'];
        $tanggal = $_POST['tanggal'];
        $mesin = $_POST['mesin'];
        $keterangan = $_POST['keterangan'];

        $queryShow = "SELECT * FROM tb_perawatan WHERE id_perawatan = '$id_perawatan';";
        $queryShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($queryShow);

        if ($_FILES['foto']['name'] == "") {
            $foto = $result['foto'];
        } else {
            $foto = $_FILES['foto']['name'];
            unlink("img/" . $result['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' . $_FILES['foto']['name']);
        }

        if ($_FILES['fotoafter']['name'] == "") {
            $foto_after = $result['fotoafter'];
        } else {
            $foto_after = $_FILES['fotoafter']['name'];
            unlink("img/" . $result['fotoafter']);
            move_uploaded_file($_FILES['fotoafter']['tmp_name'], 'img/' . $_FILES['fotoafter']['name']);
        }

        $query = "UPDATE tb_perawatan SET tanggal = '$tanggal', mesin = '$mesin', keterangan = '$keterangan', foto = '$foto', fotoafter = '$foto_after'"; // Perubahan disini
        $query .= " WHERE id_perawatan = '$id_perawatan'"; // Perubahan disini
        $sql = mysqli_query($conn, $query);
        header("location: index.php");
    }
}
if(isset($_GET['hapus'])){
    $id_perawatan = $_GET['hapus']; 

    $queryShow = "SELECT * FROM tb_perawatan WHERE id_perawatan = '$id_perawatan';";
    $queryShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($queryShow);


    unlink("img/".$result['foto']);
    unlink("img/".$result['fotoafter']);

    $query = "DELETE FROM tb_perawatan WHERE id_perawatan = '$id_perawatan';";
    $sql = mysqli_query($conn, $query);
    
    if($sql){
        header("location: index.php");
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
         //echo "hapus data <a href='index.php'>[home]</a>";
}

        
        
?>