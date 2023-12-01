<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'gdss';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productId = $_GET['id'];

    // Создаем SQL-запрос DELETE для удаления продукта с указанным id из таблицы
    $deleteQuery = "DELETE FROM product WHERE id='$productId'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if (!$deleteResult) {
        die("Ошибка выполнения запроса: " . mysqli_error($conn));
    } else {
        // Успешное удаление, перенаправляем на страницу со списком продуктов
        header("Location: index.php");
        exit();
    }
}

mysqli_close($conn);
?>
