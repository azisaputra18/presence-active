<!DOCTYPE html>
<html>
<head>
    <title>Cek Kelulusan</title>
</head>
<body>
    <form method="post">
        <label>Nilai 1:</label>
        <input type="number" name="nilai1" required><br><br>
        
        <label>Nilai 2:</label>
        <input type="number" name="nilai2" required><br><br>
        
        <label>Nilai 3:</label>
        <input type="number" name="nilai3" required><br><br>
        
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai1 = $_POST['nilai1'];
        $nilai2 = $_POST['nilai2'];
        $nilai3 = $_POST['nilai3'];

        $rata = ($nilai1 + $nilai2 + $nilai3) / 3;

        echo "<p>Rata-rata: $rata</p>";
        
        if ($rata >= 60 && $rata <= 100) {
            echo "<h2>Hasil: LULUS</p>";
        } elseif($rata < 60 && $rata >= 0){
            echo "<p>Hasil : GAGAL</p>";
        } else {
            echo "<p>Angka Tidak Sesuai</p>";
        }
    }
    ?>
</body>
</html>
