
<?php
require_once __DIR__ . '/data/menu.php';

function amanProses($teks)
{
    return htmlspecialchars(
        (string) $teks,
        ENT_QUOTES,
        'UTF-8'
    );
}

$errors = [];
$pesananValid = false;

$kode = '';
$jumlah = null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $errors[] = 'Halaman ini hanya menerima permintaan POST.';
} else {
    $kode = $_POST['kode'] ?? '';
    $jumlahInput = $_POST['jumlah'] ?? '';

    if (!is_string($kode) || !isset($menu[$kode])) {
        $errors[] = 'Kode menu tidak terdaftar.';
    }

    if (
        !is_string($jumlahInput) ||
        $jumlahInput === '' ||
        !preg_match('/^[0-9]+$/', $jumlahInput)
    ) {
        $errors[] = 'Jumlah harus berupa bilangan bulat.';
    } else {
        $jumlah = filter_var(
            $jumlahInput,
            FILTER_VALIDATE_INT
        );

        if ($jumlah === false || $jumlah < 1 || $jumlah > 10) {
            $errors[] = 'Jumlah pembelian harus antara 1 sampai 10.';
        }
    }

    if (empty($errors)) {
        $pesananValid = true;
    } else {
        http_response_code(400);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Validasi Pesanan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Hasil Validasi Pesanan</h1>

    <?php if ($pesananValid): ?>
        <h2>Pesanan valid</h2>

        <p>Nama menu: <?= amanProses($menu[$kode]['nama']) ?></p>
        <p>Jumlah: <?= $jumlah ?></p>
        <p>Harga satuan: Rp<?= number_format($menu[$kode]['harga'], 0, ',', '.') ?></p>
        <p>Subtotal: Rp<?= number_format($menu[$kode]['harga'] * $jumlah, 0, ',', '.') ?></p>

        <p>Validasi berhasil. Keranjang akan dibuat pada tahap berikutnya.</p>
    <?php else: ?>
        <h2>Pesanan ditolak</h2>

        <?php foreach ($errors as $error): ?>
            <p><?= amanProses($error) ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="index.php">Kembali ke daftar menu</a></p>
</body>
</html>
