<?php
include 'php/koneksi.php';

$query = "SELECT * FROM pendaftar";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Data Pendaftaran Bimbel</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 40px auto;
        background: #fff;
        padding: 20px 30px;
        border-radius: 8px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
        margin: 2px;
        display: inline-block;
    }

    .btn-tambah {
        background-color: #007bff;
    }

    .btn-detail {
        background-color: #28a745;
    }

    .btn-edit {
        background-color: #ffc107;
        color: #000;
    }

    .btn-hapus {
        background-color: #dc3545;
    }

    .btn:hover {
        opacity: 0.85;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #eef3f8;
    }

    .no-data {
        text-align: center;
        padding: 15px;
        color: #555;
    }
</style>

<body>
    <div class="container">
        <h1>Data Pendaftaran Bimbel</h1>

        <a href="tambahData.php" class="btn btn-tambah">Tambah Data</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Paket</th>
                <th>Total Biaya</th>
                <th>Aksi</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) == 0) {
                echo "<tr><td colspan='5' class='no-data'>Tidak ada data pelanggan</td></tr>";
            } else {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama']}</td>
                                <td>" . ($row['paket'] ? $row['paket'] : 'Undefined') . "</td>
                                <td>Rp " . number_format($row['total_biaya'], 0, ',', '.') . "</td>
                                    <td>
                                        <a href='detail.php?id=" . $row['id'] . "' class='btn btn-detail'>Detail</a>
                                        <a href='editData.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                                        <a href='php/hapus.php?id=" . $row['id'] . "' class='btn btn-hapus' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Hapus</a>
                                    </td>
                              </tr>";
                    $no++;
                }
            }
            ?>
        </table>
    </div>
</body>

</html>