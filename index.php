<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'gdss';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

$query = "SELECT product.id, product.img_path, product.name, brand.name AS brand_name, product.cost
          FROM product
          JOIN brand ON product.id_brand = brand.id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Таблица продуктов</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        img {
            max-width: 100px;
            max-height: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Таблица продуктов</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Картинка</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Бренд</th>
                    <th scope="col">Стоимость</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $productId = $row['id'];
                    $imagePath = $row['img_path'];
                    echo "<tr>";
                    echo "<td><img src='$imagePath' alt='Изображение продукта' width='200'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['brand_name'] . "</td>";
                    echo "<td>" . $row['cost'] . "</td>";
                    echo "<td><a href='edit_product.php?id=$productId' class='btn btn-primary'>Редактировать</a> ";
                    echo "<a href='delete_product.php?id=$productId' class='btn btn-danger'>Удалить</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add_product.php" class="btn btn-success mb-3">Добавить</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
