<?php
// Подключение к базе данных
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'gdss';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Добавить продукт</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Добавить продукт</h1>
        <form method="POST" action="save_product.php">
            <!-- поля для добавления данных -->
            <div class="form-group">
                <label for="imagePath">Путь до картинки:</label>
                <input type="text" class="form-control" id="imagePath" name="imagePath">
            </div>
            <div class="form-group">
                <label for="productName">Наименование продукта:</label>
                <input type="text" class="form-control" id="productName" name="productName">
            </div>
            <div class="form-group">
                <label for="productCost">Стоимость:</label>
                <input type="text" class="form-control" id="productCost" name="productCost">
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
            <button type="submit" class="btn btn-primary">Добавить товар</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
