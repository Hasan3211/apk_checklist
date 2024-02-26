<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data cetakan dari POST request
    $printData = $_POST['printData'];

    // Tentukan nama dan path file tujuan untuk menyimpan cetakan
    $filePath = 'folder_tujuan/' . 'print_' . time() . '.txt';

    // Simpan data cetakan ke file
    if (file_put_contents($filePath, $printData)) {
        echo 'Cetakan berhasil disimpan.';
    } else {
        echo 'Gagal menyimpan cetakan.';
    }
} else {
    echo 'Metode HTTP yang tidak valid.';
}
?>
