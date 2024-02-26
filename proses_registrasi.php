<?php
// Sertakan koneksi ke database
include('koneksi.php');

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memasukkan data ke database
$query = "INSERT INTO tb_user (username, password) VALUES ('$username', '$password')";

if (mysqli_query($conn, $query)) {
    echo "Registrasi berhasil. Silakan login.";
    header('Location: loginnew.php'); 
} else {
    echo "Registrasi gagal. Silakan coba lagi.";
    header('Location: registrasi_new.php');
}
?>
