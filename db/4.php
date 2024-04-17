<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Calculator</title>
</head>
<body>
    <form action="" method="post">
        <label for="angka1">Angka 1:</label>
        <input type="number" id="angka1" name="angka1" step="1" required>
        <br><br>
        <label for="angka2">Angka 2:</label>
        <input type="number" id="angka2" name="angka2" step="1" required>
        <br><br>
        <input type="submit" name="kali" value="X">
        <input type="submit" name="bagi" value=":">
        <input type="submit" name="tambah" value="+">
        <input type="submit" name="kurang" value="-">
    </form>

    <?php
    if (isset($_POST["kali"])) {
        $angka1 = intval($_POST["angka1"]);
        $angka2 = intval($_POST["angka2"]);

        $hasil = $angka1 * $angka2;

        echo "<p>Hasil perkalian " . $angka1 . " x " . $angka2 . " = " . $hasil . "</p>";
    }
    if (isset($_POST["bagi"])) {
        $angka1 = intval($_POST["angka1"]);
        $angka2 = intval($_POST["angka2"]);

        $hasil = $angka1 / $angka2;

        echo "<p>Hasil pembagian " . $angka1 . " : " . $angka2 . " = " . $hasil . "</p>";
    }
    if (isset($_POST["tambah"])) {
        $angka1 = intval($_POST["angka1"]);
        $angka2 = intval($_POST["angka2"]);

        $hasil = $angka1 + $angka2;

        echo "<p>Hasil pertambahan " . $angka1 . " + " . $angka2 . " = " . $hasil . "</p>";
    }
    if (isset($_POST["kurang"])) {
        $angka1 = intval($_POST["angka1"]);
        $angka2 = intval($_POST["angka2"]);

        $hasil = $angka1 - $angka2;

        echo "<p>Hasil pengurangan " . $angka1 . " - " . $angka2 . " = " . $hasil . "</p>";
    }
    ?>
</body>
</html>