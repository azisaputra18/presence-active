<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Calculator</title>
</head>
<body>
    <form action="" method="post">
        <label for="price">Harga Barang:</label>
        <input type="number" id="price" name="price" step="0.01" required>
        <br><br>
        <label for="discount">Diskon (%):</label>
        <input type="number" id="discount" name="discount" min="0" max="100" step="1" required>
        <br><br>
        <input type="submit" value="Hitung Diskon">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $price = floatval($_POST["price"]);
        $discount = floatval($_POST["discount"]);
        $discountAmount = $price * ($discount / 100);
        $totalPrice = $price - $discountAmount;

        echo "<p>Harga Barang: Rp. " . number_format($price, 2) . "</p>";
        echo "<p>Diskon: " . $discount . " %</p>";
        echo "<p>Diskon (Rp.): Rp. " . number_format($discountAmount, 2) . "</p>";
        echo "<p>Total Harga: Rp. " . number_format($totalPrice, 2) . "</p>";
    }
    ?>
</body>
</html>