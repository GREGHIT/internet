<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
    <!-- Подключение CSS Bootstrap с CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Дополнительные стили для контейнера и формы */
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container auth-container">
        <div class="card p-4" style="width: 300px;">
            <h2 class="mb-4">Вход на сайт</h2>
            <form action="auth.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Имя пользователя:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Войти</button>
                <p class="mt-3">Ещё не зарегистрированы? <a href="registration.php">Регистрация</a></p>
            </form>
        </div>
    </div>
</body>
</html>