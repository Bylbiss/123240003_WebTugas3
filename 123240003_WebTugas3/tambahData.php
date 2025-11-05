<!DOCTYPE html>
<html>

<head>
    <script src="script.js" defer></script>
    <title>Form Tambah Data Pendaftaran</title>

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

        textarea {
            height: 90px;
            resize: none;
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
</head>

<body>
    <div class="container">
        <h1>Tambah Data</h1>

        <form id="form_bimbel" action="php/proses_tambah.php" method="POST">
            <label for="nama" style="display: flex;"><strong>Nama : </strong></label>
            <input type="text" id="nama" name="nama" placeholder="Bylbiss El Haqqie" required>
            <br><br>

            <label for="email" style="display: flex;"><strong>Email : </strong></label>
            <input type="email" id="email" name="email" placeholder="bylbisselhaqqie@gmail.com" required>
            <br><br>
            <fieldset>
                <legend>Paket Bimbingan</legend>
                <table class="paket-table">
                    <thead style="border: 2px solid #000000;">
                        <tr style="font-size: large;">
                            <th></th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="paket" value="Paket Intensif UTBK"></td>
                            <td>Paket Intensif UTBK</td>
                            <td>Rp500.000</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="paket" value="Paket Reguler"></td>
                            <td>Paket Reguler</td>
                            <td>Rp750.000</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="paket" value="Paket Supercamp SBMPTN"></td>
                            <td>Paket Supercamp SBMPTN</td>
                            <td>Rp1.000.000</td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <br>
            <fieldset>
                <legend>Fasilitas Tambahan</legend>
                <table class="paket-table">
                    <thead style="border: 2px solid #000000;">
                        <tr style="font-size: large;">
                            <th></th>
                            <th>Fasilitas Tambahan</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label><input type="checkbox" name="fasilitas[]" value="Modul Cetak Lengkap"></label></td>
                            <td>Modul Cetak</td>
                            <td>Rp50.000</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox" name="fasilitas[]" value="Modul PDF"></label></td>
                            <td>Modul PDF</td>
                            <td>Rp25.000</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox" name="fasilitas[]" value="Video Rekaman Kelas"></label></td>
                            <td>Video Rekaman</td>
                            <td>Rp75.000</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox" name="fasilitas[]" value="Grup Diskusi Telegram"></label></td>
                            <td>Grup Diskusi</td>
                            <td>Rp40.000</td>
                        </tr>
                    </tbody>
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
                </table> <br>
                <select id="lokasi" name="lokasi" required>
                    <option value="">--Pilih Lokasi--</option>
                    <option value="Jakarta Pusat">Jakarta Pusat</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                    <option value="Aceh">Aceh</option>
                    <option value="Surabaya">Surabaya</option>
                    <option value="Makassar">Makassar</option>
                </select>
            </fieldset><br>

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
                </table> <br>
                <select id="pembayaran" name="pembayaran" required>
                    <option value="">--Pilih Metode--</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                    <option value="Tunai">Tunai</option>
                </select>
            </fieldset><br>

            <label for="note" style="display: flex;"><strong>Note : </strong></label>
            <textarea name="note" id="note" placeholder="Write your additional note here"></textarea>
            <br>

            <div class="button">
                <br><input type="reset" value="Reset">
                <input type="submit" value="Simpan"><br>
                <a href="index.php"><button type="button">Kembali ke Dashboard</button></a>
            </div>

        </form>

</body>

</html>