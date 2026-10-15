<?php
session_start();

require_once __DIR__ . '/data/menu.php';
require_once __DIR__ . '/includes/fungsi.php';

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

$keranjang = $_SESSION['keranjang'];
$subtotal = 0;

$judulHalaman = 'Keranjang Pesanan';
require_once __DIR__ . '/includes/header.php';
?>

<p>
    <a href="index.php">Kembali ke Daftar Menu</a>
</p>

<?php if (isset($_SESSION['flash'])): ?>
    <p>
        <?= htmlspecialchars(
            $_SESSION['flash']['pesan'],
            ENT_QUOTES,
            'UTF-8'
        ) ?>
    </p>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<?php if (empty($keranjang)): ?>

    <p>Keranjang masih kosong.</p>

<?php else: ?>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keranjang as $kode => $jumlah): ?>
                <?php
                if (!isset($menu[$kode])) {
                    continue;
                }

                $nama = $menu[$kode]['nama'];
                $harga = (int) $menu[$kode]['harga'];
                $jumlah = (int) $jumlah;

                $subtotalItem = hitungSubtotal($harga, $jumlah);
                $subtotal += $subtotalItem;
                ?>

                <tr>
                    <td><?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= formatRupiah($harga) ?></td>
                    <td><?= $jumlah ?></td>
                    <td><?= formatRupiah($subtotalItem) ?></td>
                    <td>
                        <form action="proses.php" method="POST">
                            <input type="hidden" name="aksi" value="hapus">
                            <input
                                type="hidden"
                                name="kode"
                                value="<?= htmlspecialchars($kode, ENT_QUOTES, 'UTF-8') ?>"
                            >
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php $hasilTotal = hitungTotal($subtotal); ?>

    <h3>Subtotal Pesanan: <?= formatRupiah($hasilTotal['subtotal']) ?></h3>
    <h3>Diskon: <?= formatRupiah($hasilTotal['diskon']) ?></h3>
    <h2>Total Bayar: <?= formatRupiah($hasilTotal['total']) ?></h2>

    <form action="proses.php" method="POST">
        <input type="hidden" name="aksi" value="kosongkan">
        <button type="submit">Kosongkan Keranjang</button>
    </form>

<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>