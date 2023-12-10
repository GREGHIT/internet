<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'gdss';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

$productId = $_GET['id'];

$query = "SELECT * FROM product WHERE id = $productId";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($conn));
}

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Редактировать продукт</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Редактировать продукт</h1>
        <form method="POST" action="update_product.php">
            <input type="hidden" name="productId" value="<?php echo $productId; ?>">
            <div class="form-group">
                <label for="productName">Наименование продукта:</label>
                <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $product['name']; ?>">
            </div>
            <div class="form-group">
                <label for="productBrand">Бренд:</label>
                <!-- Поле для выбора бренда -->
                <select class="form-control" id="productBrand" name="productBrand">
                    <?php
                    $brandQuery = "SELECT id, name FROM brand";
                    $brandResult = mysqli_query($conn, $brandQuery);

                    if (!$brandResult) {
                        die("Ошибка выполнения запроса: " . mysqli_error($conn));
                    }

                    while ($row = mysqli_fetch_assoc($brandResult)) {
                        $selected = ($row['id'] == $product['id_brand']) ? "selected" : "";
                        echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="productCost">Стоимость:</label>
                <input type="text" class="form-control" id="productCost" name="productCost" value="<?php echo $product['cost']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
