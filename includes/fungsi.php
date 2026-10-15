<WritingBlock id="73519" variant="standard">```php
<?php

function hitungSubtotal($harga, $jumlah)
{
    return $harga * $jumlah;
}

function hitungTotal($subtotal)
{
    $diskon = 0;

    if ($subtotal >= 50000) {
        $diskon = $subtotal * 0.10;
    }

    return [
        'subtotal' => $subtotal,
        'diskon' => $diskon,
        'total' => $subtotal - $diskon
    ];
}

function formatRupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}