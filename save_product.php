<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'gdss';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $imagePath = !empty($_POST['imagePath']) ? str_replace('\\', '/', $_POST['imagePath']) : 'picture\msql_img\no_img.png';
        $productName = $_POST['productName'];
        $productBrand = $_POST['productBrand'];
        $productCost = $_POST['productCost'];
    
        $imagePath = addslashes($imagePath);
        $productName = addslashes($productName);
        $productBrand = addslashes($productBrand);
        $productCost = addslashes($productCost);
    
        // Создаем SQL-запрос для добавления нового продукта в базу данных
        $insertQuery = "INSERT INTO product (img_path, name, id_brand, cost) VALUES ('$imagePath', '$productName', '$productBrand', '$productCost')";
        $insertResult = mysqli_query($conn, $insertQuery);

    if (!$insertResult) {
        die("Ошибка выполнения запроса: " . mysqli_error($conn));
    } else {
        // Успешное добавление, перенаправляем на страницу со списком продуктов
        header("Location: index.php");
        exit();
    }
    }
}

mysqli_close($conn);
?>