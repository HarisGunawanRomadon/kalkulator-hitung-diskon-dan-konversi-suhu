<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hitung Diskon</title>
  <link rel="stylesheet" href="../css/diskon.css">
</head>

<body>
  <div class="main-container">
    <h1>Hitung Diskon</h1>
    <form action="" method="post">
      <ul>
        <li>
          <label for="harga_asli">Harga:</label>
          <input type="number" id="harga_asli" name="harga_asli" step="any">
        </li>
        <li>
          <label for="persentase_diskon">Diskon (%):</label>
          <input type="text" id="persentase_diskon" name="persentase_diskon">
        </li>
        <li>
          <button type="submit" class="submit-button" name="hitung">Hitung Diskon</button>
        </li>
        <li>
          <button type="button" class="back-button"><a href="../index.php">Kembali</a></button>
        </li>
      </ul>
    </form>
    <?php
    if (isset($_POST["hitung"])) {
      function hitungDiskon($harga_asli, $persentase_diskon)
      {
        $diskon = $harga_asli * ($persentase_diskon / 100);
        $harga_setelah_diskon = $harga_asli - $diskon;
        return $harga_setelah_diskon;
      }

      $harga_asli = floatval($_POST["harga_asli"]);
      $persentase_diskon = floatval($_POST["persentase_diskon"]);

      $harga_akhir = hitungDiskon($harga_asli, $persentase_diskon);

      echo "<section class='panel-info'>";
      echo "<div class='info-harga'>";
      echo "<p>Harga: </p>";
      echo "<p>" . 'Rp.' . ' ' . number_format($harga_asli, 2) . "</p>";
      echo "</div>";

      echo "<div class='info-diskon'>";
      echo "<p>Diskon: </p>";
      echo "<p>" . $persentase_diskon . "%" . "</p>";
      echo "</div>";


      echo "<div class='result'>";
      echo "<p>Harga setelah diskon: </p>";
      echo "<p>" . 'Rp.' . ' ' . number_format($harga_akhir, 2) . "<p>";
      echo "</section>";
    }
    ?>
  </div>
</body>

</html>