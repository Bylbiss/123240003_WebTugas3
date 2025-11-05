<?php
include 'koneksi.php';
include 'hitung_harga.php';

$harga = hitung_harga($paket, $_POST['fasilitas'] ?? [], $lokasi, $pembayaran);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id         = intval($_POST['id']);
    $nama       = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email      = mysqli_real_escape_string($koneksi, $_POST['email']);
    $paket      = $_POST['paket'] ?? 'Undefined';
    $fasilitas_array = $_POST['fasilitas'] ?? [];
    $fasilitas = !empty($fasilitas_array) ? implode(", ", $fasilitas_array) : '-';
    $lokasi     = $_POST['lokasi'] ?? '';
    $pembayaran = $_POST['pembayaran'] ?? '';
    $catatan    = mysqli_real_escape_string($koneksi, $_POST['note'] ?? '-');

    $harga = hitung_harga($paket, $fasilitas_array, $lokasi, $pembayaran);
    extract($harga);

    $query = "UPDATE pendaftar SET 
        nama='$nama',
        email='$email',
        paket='$paket',
        fasilitas='$fasilitas',
        lokasi='$lokasi',
        metode_pembayaran='$pembayaran',
        catatan='$catatan',
        price1='$price1',
        price2='$price2',
        price3='$price3',
        price4='$price4',
        tax='$tax',
        taxes='$taxes',
        total_biaya='$total_biaya'
        WHERE id='$id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: ../detail.php?id=$id&update=update_berhasil");
        exit();
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
} else {
    echo "Metode tidak diizinkan.";
}
