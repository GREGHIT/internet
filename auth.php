<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получите данные из формы авторизации
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Подключение к базе данных
    $host = "localhost";
    $database = "gdss";
    $username_db = "root";
    $password_db = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username_db, $password_db);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Ошибка соединения с базой данных: " . $e->getMessage());
    }

    // Подготовка SQL-запроса для получения хеша пароля и соли
    $query = "SELECT password_hash, salt FROM users WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        $stored_password_hash = $user['password_hash'];
        $salt = $user['salt'];
    
        // Проверка пароля
        if (password_verify($password . $salt, $stored_password_hash)) {
            if ($username !== 'admin') {
                // Сохранение user_id в куке
                header("Location: index.html");
                exit();
            } else {
                // Перенаправление на "product.php"
                header("Location: product.php");
                exit();
            }
        } 
        else 
        {
            // Неправильный пароль
            echo "Неправильный пароль.";
        }
    } else {
        // Пользователь не существует
        echo "Пользователь не найден.";
    }
}
?>