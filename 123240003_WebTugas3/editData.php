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
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Edit Data Pendaftaran</title>
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
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 30px 40px;
    }

    h1 {
        text-align: center;
        color: #2b2b2b;
        margin-bottom: 25px;
    }

    label {
        font-weight: bold;
        margin-bottom: 6px;
        display: block;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
    }

    fieldset {
        border-left: 3px solid #1d4ed8;
        border-right: 3px solid #1d4ed8;
        border-top: none;
        border-bottom: none;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        background-color: #fafafa;
    }

    legend {
        font-weight: bold;
        color: #1d4ed8;
        padding: 0 10px;
        font-size: 17px;
    }

    .paket-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .paket-table th,
    .paket-table td {
        border: 1px solid #ccc;
        padding: 8px 10px;
        text-align: left;
        font-size: 14px;
    }

    .paket-table th {
        background-color: #e9ecef;
    }

    textarea {
        height: 90px;
        resize: none;
    }

    .button {
        margin-top: 15px;
        text-align: center;
    }

    input[type="submit"],
    input[type="reset"] {
        padding: 8px 15px;
        margin: 5px;
        border: none;
        border-radius: 4px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    input[type="reset"] {
        background-color: #f44336;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .button a button {
        padding: 8px 15px;
        margin: 5px;
        border: none;
        border-radius: 4px;
        background-color: #2196F3;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button a button:hover {
        background-color: #1976D2;
    }
</style>

<body>
    <div class="container">
        <h1>Bimbel Babarsari</h1>

        <form action="php/proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label for="nama" style="display: flex;"><strong>Nama : </strong></label>
            <input type="text" name="nama" placeholder="Bylbiss El Haqqie" value="<?= htmlspecialchars($data['nama']) ?>" required>
            <br><br>

            <label for="email" style="display: flex;"><strong>Email : </strong></label>
            <input type="email" name="email" placeholder="bylbisselhaqqie@gmail.com" value="<?= htmlspecialchars($data['email']) ?>" required>
            <br><br>

            <fieldset>
                <legend>Paket Bimbingan</legend>
                <table class="paket-table">
                    <tr>
                        <th></th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                    </tr>
                    <tr>
                        <td><input type="radio" name="paket" value="Paket Intensif UTBK" <?= $data['paket'] == 'Paket Intensif UTBK' ? 'checked' : '' ?>></td>
                        <td>Paket Intensif UTBK</td>
                        <td>Rp500.000</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="paket" value="Paket Reguler" <?= $data['paket'] == 'Paket Reguler' ? 'checked' : '' ?>></td>
                        <td>Paket Reguler</td>
                        <td>Rp750.000</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="paket" value="Paket Supercamp SBMPTN" <?= $data['paket'] == 'Paket Supercamp SBMPTN' ? 'checked' : '' ?>></td>
                        <td>Paket Supercamp SBMPTN</td>
                        <td>Rp1.000.000</td>
                    </tr>
                </table>
            </fieldset>
            <br>

            <fieldset>
                <legend>Fasilitas Tambahan</legend>
                <table class="paket-table">
                    <tr>
                        <th></th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                    </tr>
                    <?php
                    $fasilitas_terpilih = explode(", ", $data['fasilitas']);
                    $fasilitas_list = [
                        ["nama" => "Modul Cetak Lengkap", "label" => "Modul Cetak", "harga" => "Rp50.000"],
                        ["nama" => "Modul PDF", "label" => "Modul PDF", "harga" => "Rp25.000"],
                        ["nama" => "Video Rekaman Kelas", "label" => "Video Rekaman", "harga" => "Rp75.000"],
                        ["nama" => "Grup Diskusi Telegram", "label" => "Grup Diskusi", "harga" => "Rp40.000"]
                    ];

                    foreach ($fasilitas_list as $fasilitas) {
                        $checked = in_array($fasilitas['nama'], $fasilitas_terpilih) ? "checked" : "";
                        echo "
                        <tr>
                            <td><input type='checkbox' name='fasilitas[]' value='{$fasilitas['nama']}' $checked></td>
                            <td>{$fasilitas['label']}</td>
                            <td>{$fasilitas['harga']}</td>
                        </tr>";
                    }
                    ?>
                </table>
            </fieldset><br>

            <fieldset>
                <legend>Lokasi Cabang</legend>
                <table class="paket-table">
                    <thead style="border: 2px solid #000000;">
                        <tr style="font-size: large;">
                            <th>Lokasi</th>
                            <th>Biaya Tambahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jakarta Pusat</td>
                            <td>Rp100.000</td>
                        </tr>
                        <tr>
                            <td>Yogyakarta</td>
                            <td>Rp80.000</td>
                        </tr>
                        <tr>
                            <td>Aceh</td>
                            <td>Rp120.000</td>
                        </tr>
                        <tr>
                            <td>Surabaya</td>
                            <td>Rp150.000</td>
                        </tr>
                        <tr>
                            <td>Makassar</td>
                            <td>Rp115.000</td>
                        </tr>
                    </tbody>
                </table>
                <select name="lokasi" required>
                    <option value="">--Pilih Lokasi--</option>
                    <?php
                    $lokasi_list = ["Jakarta Pusat", "Yogyakarta", "Aceh", "Surabaya", "Makassar"];
                    foreach ($lokasi_list as $lok) {
                        $selected = ($data['lokasi'] == $lok) ? "selected" : "";
                        echo "<option value='$lok' $selected>$lok</option>";
                    }
                    ?>
                </select>
            </fieldset>
            <br>

            <fieldset>
                <legend>Metode Pembayaran</legend>
                <table class="paket-table">
                    <thead style="border: 2px solid #000000;">
                        <tr style="font-size: large;">
                            <th>Metode Pembayaran</th>
                            <th>Biaya Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Transfer Bank</td>
                            <td>+Rp3000</td>
                        </tr>
                        <tr>
                            <td>E-Wallet</td>
                            <td>+Rp2000</td>
                        </tr>
                        <tr>
                            <td>Tunai</td>
                            <td>Rp0</td>
                        </tr>
                    </tbody>
                </table>
                <select name="pembayaran" required>
                    <option value="">--Pilih Metode--</option>
                    <?php
                    $pembayaran_list = ["Transfer Bank", "E-Wallet", "Tunai"];
                    foreach ($pembayaran_list as $metode) {
                        $selected = ($data['metode_pembayaran'] == $metode) ? "selected" : "";
                        echo "<option value='$metode' $selected>$metode</option>";
                    }
                    ?>
                </select>
            </fieldset>
            <br><br>

            <label for="note" style="display: flex;"><strong>Note : </strong></label>
            <textarea name="note" id="note" placeholder="Write your additional note here"><?= htmlspecialchars($data['catatan']) ?></textarea><br>

            <div class="button">
                <br><input type="reset" value="Reset">
                <input type="submit" value="Update"><br>
                <a href="index.php"><button type="button">Kembali ke Dashboard</button></a>
            </div>
        </form>
    </div>
</body>

</html>