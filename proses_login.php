<?php
session_start();

// Sertakan koneksi ke database
include('koneksi.php');

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencocokkan username dan password di database
$query = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    // Login berhasil
    $_SESSION['username'] = $username;
    header('Location: index.php?pesanm'); // Ganti ini dengan halaman utama Anda
} else {
    // Login gagal
    echo "Login gagal. Silakan coba lagi atau registrasi.";
    header('Location: loginnew.php?pesan');
}
?>
