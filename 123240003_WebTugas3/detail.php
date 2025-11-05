<?php
include 'php/koneksi.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);

$query = "SELECT * FROM pendaftar WHERE id = $id";
$result = mysqli_query($koneksi, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Data tidak ditemukan.");
}

$data = mysqli_fetch_assoc($result);

$nama       = htmlspecialchars($data['nama']);
$email      = htmlspecialchars($data['email']);
$paket      = !empty($data['paket']) ? htmlspecialchars($data['paket']) : 'Undefined';
$fasilitas  = !empty($data['fasilitas']) ? htmlspecialchars($data['fasilitas']) : '-';
$lokasi     = htmlspecialchars($data['lokasi']);
$pembayaran = htmlspecialchars($data['metode_pembayaran']);
$note       = !empty($data['catatan']) ? htmlspecialchars($data['catatan']) : '-';
$tanggal    = htmlspecialchars($data['tanggal_daftar']);

$price1 = $data['price1'];
$price2 = $data['price2'];
$price3 = $data['price3'];
$price4 = $data['price4'];
$tax = $data['tax'];
$taxes = $data['taxes'];
$total = $data['total_biaya'];

function rupiah($angka)
{
    return "Rp" . number_format($angka, 0, ',', '.');
}

if (isset($_GET['update']) && $_GET['update'] === 'success'): ?>
    <div style="
        background-color: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 15px;
        font-weight: 500;
        text-align: center;
        animation: fadeOut 3s ease-in-out forwards;
    ">
        ✅ Data berhasil diperbarui!
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Data Pendaftaran</title>
</head>
<style>
    body {
        font-family: "Times New Roman", serif;
        background-color: #f2f4f7;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 700px;
        margin: 40px auto;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 25px 35px;
    }

    h1 {
        text-align: center;
        color: #2b2b2b;
        margin-bottom: 25px;
        font-size: 24px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    td {
        padding: 8px 10px;
        border-bottom: 1px solid #ddd;
    }

    td:first-child {
        width: 40%;
        font-weight: bold;
        color: #333;
    }

    fieldset {
        border-left: 3px solid #1d4ed8;
        border-right: 3px solid #1d4ed8;
        border-top: none;
        border-bottom: none;
        padding: 20px;
        border-radius: 8px;
        margin-top: 10px;
    }

    legend {
        font-weight: bold;
        color: #1d4ed8;
        padding: 0 10px;
        font-size: 18px;
    }

    .rincian-table td {
        border: none;
        padding: 6px 5px;
    }

    .rincian-table td:first-child {
        font-weight: bold;
    }

    .rincian-table td:last-child {
        text-align: right;
    }

    .button {
        text-align: center;
        margin-top: 25px;
    }

    .btn {
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        color: #fff;
        cursor: pointer;
        font-size: 15px;
        font-weight: 600;
        background-color: #2563eb;
        transition: 0.3s;
    }

    .btn:hover {
        background-color: #1e40af;
    }
</style>

<body>
    <div class="container">
        <h1>Data Pendaftaran Bimbel Babarsari</h1>

        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td><?= $nama ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $email ?></td>
            </tr>
            <tr>
                <td>Paket Bimbel</td>
                <td><?= $paket ?: 'Undefined' ?></td>
            </tr>
            <tr>
                <td>Lokasi Belajar</td>
                <td><?= $lokasi ?></td>
            </tr>
            <tr>
                <td>Fasilitas Tambahan</td>
                <td><?= $fasilitas ?></td>
            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td><?= $pembayaran ?></td>
            </tr>
            <tr>
                <td>Catatan</td>
                <td><?= $note ?></td>
            </tr>
            <tr>
                <td>Tanggal Pendaftaran</td>
                <td><?= date('d-m-Y H:i', strtotime($tanggal)) ?></td>
            </tr>
        </table>

        <fieldset>
            <legend>Rincian Biaya</legend>
            <table>
                <tr>
                    <td>Paket</td>
                    <td><?= rupiah($price1) ?></td>
                </tr>
                <tr>
                    <td>Fasilitas Tambahan</td>
                    <td><?= rupiah($price2) ?></td>
                </tr>
                <tr>
                    <td>Lokasi Belajar</td>
                    <td><?= rupiah($price3) ?></td>
                </tr>
                <tr>
                    <td>Biaya Layanan</td>
                    <td><?= rupiah($price4) ?></td>
                </tr>
                <tr>
                    <td>Pajak (10%)</td>
                    <td><?= rupiah($taxes) ?></td>
                </tr>
                <tr>
                    <td><strong> Total Bayar</strong></td>
                    <td><strong><?= rupiah($total) ?></strong></td>
                </tr>
            </table>
        </fieldset>

        <div class="button">
            <br><a href="index.php"><button class="btn">Kembali ke Dashboard</button></a>
        </div>
    </div>
</body>

</html>