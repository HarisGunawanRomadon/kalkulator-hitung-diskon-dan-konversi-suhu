<?php
$result = '0';
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["hapus"])) {
    // Tombol hapus ditekan, reset hasil konversi
    $result = '0';
    $suhu = ''; // Mengatur suhu kosong
    $konversi = ''; // Mengatur konversi kosong
  } elseif (isset($_POST["hitung"])) {
    // Tombol hitung ditekan, lakukan konversi suhu
    $suhu = isset($_POST["suhu"]) ? $_POST["suhu"] : '';
    $konversi = isset($_POST["konversi"]) ? $_POST["konversi"] : '';

    if (!is_numeric($suhu) || $suhu === '') {
      $result = 'Masukkan Suhu Yang Valid!';
      $error = true;
    } else {
      $error = false;
      switch ($konversi) {
        case "c_to_f":
          $result = ($suhu * 9 / 5) + 32;
          $result = number_format($result, 2) . " °F";
          break;
        case "c_to_k":
          $result = $suhu + 273.15;
          $result = number_format($result, 2) . " K";
          break;
        case "c_to_r":
          $result = $suhu * 4 / 5;
          $result = number_format($result, 2) . " °R";
          break;
        case "c_to_rankine":
          $result = ($suhu + 273.15) * 9 / 5;
          $result = number_format($result, 2) . " °R";
          break;
        case "f_to_c":
          $result = ($suhu - 32) * 5 / 9;
          $result = number_format($result, 2) . " °C";
          break;
        case "f_to_k":
          $result = ($suhu - 32) * 5 / 9 + 273.15;
          $result = number_format($result, 2) . " K";
          break;
        case "f_to_r":
          $result = ($suhu - 32) * 4 / 9;
          $result = number_format($result, 2) . " °R";
          break;
        case "f_to_rankine":
          $result = $suhu + 459.67;
          $result = number_format($result, 2) . " °R";
          break;
        case "k_to_c":
          $result = $suhu - 273.15;
          $result = number_format($result, 2) . " °C";
          break;
        case "k_to_f":
          $result = ($suhu - 273.15) * 9 / 5 + 32;
          $result = number_format($result, 2) . " °F";
          break;
        case "k_to_r":
          $result = ($suhu - 273.15) * 4 / 5;
          $result = number_format($result, 2) . " °R";
          break;
        case "k_to_rankine":
          $result = $suhu * 9 / 5;
          $result = number_format($result, 2) . " °R";
          break;
        case "r_to_c":
          $result = $suhu * 5 / 4;
          $result = number_format($result, 2) . " °C";
          break;
        case "r_to_f":
          $result = ($suhu * 9 / 4) + 32;
          $result = number_format($result, 2) . " °F";
          break;
        case "r_to_k":
          $result = ($suhu * 5 / 4) + 273.15;
          $result = number_format($result, 2) . " K";
          break;
        case "r_to_rankine":
          $result = $suhu * 9 / 4 + 491.67;
          $result = number_format($result, 2) . " °R";
          break;
        case "rankine_to_c":
          $result = ($suhu - 491.67) * 5 / 9;
          $result = number_format($result, 2) . " °C";
          break;
        case "rankine_to_f":
          $result = $suhu - 459.67;
          $result = number_format($result, 2) . " °F";
          break;
        case "rankine_to_k":
          $result = $suhu * 5 / 9;
          $result = number_format($result, 2) . " K";
          break;
        case "rankine_to_r":
          $result = $suhu - 491.67;
          $result = number_format($result, 2) . " °R";
          break;
        default:
          $result = 'Jenis konversi tidak valid';
          break;
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konversi Suhu</title>
  <link rel="stylesheet" href="../css/konversi.css">
</head>

<body>
  <div class="main-container">
    <h1>Konversi Suhu</h1>
    <form action="" method="post">
      <section class="conversion-form">
        <ul>
          <li>
            <label for="suhu">Masukan Suhu:</label>
            <input type="number" id="suhu" name="suhu" step="any" value="<?php echo htmlspecialchars(isset($suhu) ? $suhu : ''); ?>">
            <?php if ($error && $result == 'Masukkan Suhu Yang Valid!') : ?>
              <p style="color: red;">Masukkan suhu terlebih dahulu!</p>
            <?php endif; ?>
          </li>
          <li>
            <label for="konversi">Konversi ke:</label>
            <select name="konversi" id="konversi">
              <option value="" disabled selected>---Pilih Jenis Suhu---</option>
              <option value="c_to_f" <?php echo (isset($konversi) && $konversi == "c_to_f") ? 'selected' : ''; ?>>Celcius (C) => Fahrenheit (F)</option>
              <option value="c_to_k" <?php echo (isset($konversi) && $konversi == "c_to_k") ? 'selected' : ''; ?>>Celcius (C) => Kelvin (K)</option>
              <option value="c_to_r" <?php echo (isset($konversi) && $konversi == "c_to_r") ? 'selected' : ''; ?>>Celcius (C) => Reamur (R)</option>
              <option value="c_to_rankine" <?php echo (isset($konversi) && $konversi == "c_to_rankine") ? 'selected' : ''; ?>>Celcius (C) => Rankine</option>
              <option value="f_to_c" <?php echo (isset($konversi) && $konversi == "f_to_c") ? 'selected' : ''; ?>>Fahrenheit (F) => Celcius (C)</option>
              <option value="f_to_k" <?php echo (isset($konversi) && $konversi == "f_to_k") ? 'selected' : ''; ?>>Fahrenheit (F) => Kelvin (K)</option>
              <option value="f_to_r" <?php echo (isset($konversi) && $konversi == "f_to_r") ? 'selected' : ''; ?>>Fahrenheit (F) => Reamur (R)</option>
              <option value="f_to_rankine" <?php echo (isset($konversi) && $konversi == "f_to_rankine") ? 'selected' : ''; ?>>Fahrenheit (F) => Rankine</option>
              <option value="k_to_c" <?php echo (isset($konversi) && $konversi == "k_to_c") ? 'selected' : ''; ?>>Kelvin (K) => Celcius (C)</option>
              <option value="k_to_f" <?php echo (isset($konversi) && $konversi == "k_to_f") ? 'selected' : ''; ?>>Kelvin (K) => Fahrenheit (F)</option>
              <option value="k_to_r" <?php echo (isset($konversi) && $konversi == "k_to_r") ? 'selected' : ''; ?>>Kelvin (K) => Reamur (R)</option>
              <option value="k_to_rankine" <?php echo (isset($konversi) && $konversi == "k_to_rankine") ? 'selected' : ''; ?>>Kelvin (K) => Rankine</option>
              <option value="r_to_c" <?php echo (isset($konversi) && $konversi == "r_to_c") ? 'selected' : ''; ?>>Reamur (R) => Celcius (C)</option>
              <option value="r_to_f" <?php echo (isset($konversi) && $konversi == "r_to_f") ? 'selected' : ''; ?>>Reamur (R) => Fahrenheit (F)</option>
              <option value="r_to_k" <?php echo (isset($konversi) && $konversi == "r_to_k") ? 'selected' : ''; ?>>Reamur (R) => Kelvin (K)</option>
              <option value="r_to_rankine" <?php echo (isset($konversi) && $konversi == "r_to_rankine") ? 'selected' : ''; ?>>Reamur (R) => Rankine</option>
              <option value="rankine_to_c" <?php echo (isset($konversi) && $konversi == "rankine_to_c") ? 'selected' : ''; ?>>Rankine => Celcius (C)</option>
              <option value="rankine_to_f" <?php echo (isset($konversi) && $konversi == "rankine_to_f") ? 'selected' : ''; ?>>Rankine => Fahrenheit (F)</option>
              <option value="rankine_to_k" <?php echo (isset($konversi) && $konversi == "rankine_to_k") ? 'selected' : ''; ?>>Rankine => Kelvin (K)</option>
              <option value="rankine_to_r" <?php echo (isset($konversi) && $konversi == "rankine_to_r") ? 'selected' : ''; ?>>Rankine => Reamur (R)</option>
            </select>
          </li>
          <li>
            <label for="hasil">Hasil Konversi:</label>
            <input type="text" id="hasil" name="hasil" value="<?php echo htmlspecialchars($result); ?>" disabled>
          </li>
          <li class="form-buttons">
            <button type="submit" name="hapus" class="clear-button">Hapus</button>
            <button type="submit" name="hitung" class="submit-button">Hitung</button>
            <button type="button" class="back-button"><a href="../index.php">Kembali</a></button>
          </li>
        </ul>
      </section>
    </form>
  </div>
</body>

</html>