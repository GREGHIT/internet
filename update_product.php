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
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productBrand = $_POST['productBrand'];
    $productCost = $_POST['productCost'];

    $updateQuery = "UPDATE product SET name='$productName', id_brand='$productBrand', cost='$productCost' WHERE id='$productId'";
    $updateResult = mysqli_query($conn, $updateQuery);

        if (!$updateResult) {
            die("Ошибка выполнения запроса: " . mysqli_error($conn));
        } else {
            header("Location: index.php");
        }
    }
mysqli_close($conn);
?>