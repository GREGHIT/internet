<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Настройки подключения к базе данных
$host = 'localhost'; // Замените на адрес вашего сервера БД
$database = 'gdss'; // Имя вашей базы данных
$username = 'root'; // Имя пользователя БД
$password = ''; // Пароль пользователя БД

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Устанавливаем режим обработки ошибок на выброс исключений
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Устанавливаем кодировку по умолчанию
    $pdo->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}


// Вставьте здесь код для соединения с базой данных из db_connection.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получите данные из формы
    $username2 = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $full_name = $_POST['full_name'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $interests = $_POST['interests'];
    $vk_profile = $_POST['vk_profile'];
    $blood_group = $_POST['blood_group'];
    $rhesus_factor = $_POST['rhesus_factor'];

    // Проверки на валидность данных
    if ($password !== $password_confirm) {
        echo "Пароли не совпадают";
        exit();
    }

    if (strlen($password) < 6 || !preg_match("/[A-Z]+/", $password) || !preg_match("/[a-z]+/", $password) || !preg_match("/[0-9]+/", $password) || !preg_match("/[^A-Za-z0-9]+/", $password)) {
        echo "Пароль не соответствует требованиям";
        exit();
    }

    // Проверьте, не существует ли пользователь с таким email
    $check_query = "SELECT * FROM users WHERE email = ?";
    $check_stmt = $pdo->prepare($check_query);
    $check_stmt->execute([$email]);
    $existing_user = $check_stmt->fetch();

    if ($existing_user) {
        echo "Пользователь с таким email уже существует";
        exit();
    }

    // Хешируйте пароль с использованием соли
    $salt = bin2hex(random_bytes(16)); // Генерация соли
    $hashed_password = password_hash($password . $salt, PASSWORD_BCRYPT);

    // Сохраните данные пользователя в базе данных
    $insert_query = "INSERT INTO users (username, email, password_hash, salt,full_name, birthdate, gender, interests, vk_profile, blood_group, rhesus_factor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insert_stmt = $pdo->prepare($insert_query);
    $insert_stmt->execute([$username2, $email, $hashed_password, $salt,$full_name, $birthdate, $gender, $interests, $vk_profile, $blood_group, $rhesus_factor]);

    echo "Регистрация успешно завершена. <a href='login.php'>Авторизация</a>";
}
?>
