<?php
include 'koneksi.php';
include 'hitung_harga.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email =  mysqli_real_escape_string($koneksi, $_POST['email']);
    $paket = isset($_POST['paket']) ? $_POST['paket'] : 'Undefined';
    $fasilitas = isset($_POST['fasilitas']) ? $_POST['fasilitas'] : [];
    $lokasi = $_POST['lokasi'];
    $pembayaran = $_POST['pembayaran'];
    $catatan =  mysqli_real_escape_string($koneksi, $_POST['note'] ?? '-');

    $harga = hitung_harga($paket, $fasilitas, $lokasi, $pembayaran);
    extract($harga);
    $fasilitas_str = !empty($fasilitas) ? implode(', ', $fasilitas) : '-';


    $tanggal = date('Y-m-d H:i:s');

    $query = "INSERT INTO pendaftar 
            (nama, email, paket, fasilitas, lokasi, metode_pembayaran, catatan, price1, price2, price3, price4, tax, taxes, total_biaya, tanggal_daftar) 
            VALUES 
            ('$nama', '$email', '$paket', '$fasilitas_str', '$lokasi', '$pembayaran', '$catatan', $price1, $price2, $price3, $price4, $tax, $taxes, $total_biaya, '$tanggal')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: ../index.php?status=tambah_berhasil");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
