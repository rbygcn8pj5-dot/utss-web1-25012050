
<?php
require_once __DIR__ . '/data/menu.php';

$kataKunci = trim($_GET['cari'] ?? '');
$hasilMenu = [];

foreach ($menu as $kode => $item) {
    if (
        $kataKunci === '' ||
        stripos($item['nama'], $kataKunci) !== false
    ) {
        $hasilMenu[$kode] = $item;
    }
}

function aman($teks)
{
    return htmlspecialchars(
        (string) $teks,
        ENT_QUOTES,
        'UTF-8'
    );
}

function rupiah($angka)
{
    return 'Rp' . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Kantin Kampus</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Pemesanan Kantin Kampus</h1>

    <form method="GET" action="index.php">
        <input
            type="text"
            name="cari"
            placeholder="Cari nama menu..."
            value="<?= aman($kataKunci) ?>"
        >
        <button type="submit">Cari</button>
        <a href="index.php">Reset</a>
    </form>

    <h2>Daftar Menu</h2>

    <?php if (empty($hasilMenu)): ?>
        <p>Menu tidak ditemukan.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hasilMenu as $kode => $item): ?>
                    <tr>
                        <td><?= aman($kode) ?></td>
                        <td><?= aman($item['nama']) ?></td>
                        <td><?= aman($item['kategori']) ?></td>
                        <td><?= rupiah($item['harga']) ?></td>
                        <td>
    <form action="proses.php" method="POST">
        <input type="hidden" name="kode"
               value="<?= aman($kode) ?>">

        <input type="number" name="jumlah"
               min="1" max="10" value="1" required>

        <button type="submit">Pesan</button>
    </form>
</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
