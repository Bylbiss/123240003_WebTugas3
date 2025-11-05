<?php
include 'koneksi.php';

// Pastikan ada parameter id
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

// Ubah ke integer supaya aman
$id = intval($_GET['id']);

// Query hapus data berdasarkan id
$sql = "DELETE FROM pendaftar WHERE id = $id";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    // Cek apakah tabel sudah kosong
    $check = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pendaftar");
    $data = mysqli_fetch_assoc($check);

    // Jika kosong
    if ($data['total'] == 0) {
        mysqli_query($koneksi, "ALTER TABLE pendaftar AUTO_INCREMENT = 1");
    }

    // Balik ke halaman dashboard
    header('Location: ../index.php');
    exit();
} else {
    die("Gagal menghapus data: " . mysqli_error($koneksi));
}
