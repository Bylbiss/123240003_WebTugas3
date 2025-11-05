<?php
function hitung_harga($paket, $fasilitas, $lokasi, $pembayaran)
{
    $price1 = match ($paket) {
        'Paket Intensif UTBK' => 500000,
        'Paket Reguler' => 750000,
        'Paket Supercamp SBMPTN' => 1000000,
        default => 0,
    };

    $price2 = 0;
    if (is_array($fasilitas)) {
        foreach ($fasilitas as $f) {
            $price2 += match ($f) {
                'Modul Cetak Lengkap' => 50000,
                'Modul PDF' => 25000,
                'Video Rekaman Kelas' => 75000,
                'Grup Diskusi Telegram' => 40000,
                default => 0,
            };
        }
    }

    $price3 = match ($lokasi) {
        'Jakarta Pusat' => 100000,
        'Yogyakarta' => 80000,
        'Aceh' => 120000,
        'Surabaya' => 150000,
        'Makassar' => 115000,
        default => 0,
    };

    $price4 = match ($pembayaran) {
        'Transfer Bank' => 3000,
        'E-Wallet' => 2000,
        'Tunai' => 0,
        default => 0,
    };

    $tax = 10;
    $subtotal = $price1 + $price2 + $price3 + $price4;
    $taxes = round($subtotal * $tax / 100);
    $total_biaya = $subtotal + $taxes;

    return compact('price1', 'price2', 'price3', 'price4', 'tax', 'taxes', 'total_biaya');
}
