<?php
// Inisialisasi variabel hasil dengan nilai default 0
$hasil = '0';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $angka1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
  $angka2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;

  if (isset($_POST['tambah'])) {
    $hasil = $angka1 + $angka2;
  } elseif (isset($_POST['kurang'])) {
    $hasil = $angka1 - $angka2;
  } elseif (isset($_POST['kali'])) {
    $hasil = $angka1 * $angka2;
  } elseif (isset($_POST['bagi'])) {
    $hasil = $angka2 != 0 ? $angka1 / $angka2 : 'Error: Pembagian dengan nol';
  } elseif (isset($_POST['hapus'])) {
    // Hapus nilai hasil
    $hasil = '0';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator</title>
  <link rel="stylesheet" href="../css/kalkulator.css">
</head>

<body>
  <div class="main-container">
    <h1>Kalkulator Sederhana</h1>
    <form action="" method="post">
      <ul>
        <li>
          <label for="num1">Angka Pertama:</label>
          <input type="number" id="num1" name="num1" step="any">
        </li>
        <li>
          <label for="num2">Angka Kedua:</label>
          <input type="number" id="num2" name="num2" step="any">
        </li>
        <li class="button-menu2">
          <button type="submit" name="tambah">+</button>
          <button type="submit" name="kurang">-</button>
          <button type="submit" name="kali">x</button>
          <button type="submit" name="bagi">/</button>
        </li>
        <li>
          <label for="hasil">Hasil:</label>
          <input type="text" id="hasil" name="hasil" value="<?= htmlspecialchars($hasil) ?>" disabled>
        </li>
        <li>
          <button type="submit" name="hapus" class="clear-button">C</button>
          <button type="button" class="back-button"><a href="../index.php">Kembali</a></button>
        </li>
      </ul>
    </form>
  </div>
</body>

</html>