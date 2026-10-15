```php
<?php
if (!isset($judulHalaman)) {
    $judulHalaman = 'Aplikasi Pemesanan Menu';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($judulHalaman, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <h1><?= htmlspecialchars($judulHalaman, ENT_QUOTES, 'UTF-8') ?></h1>
```