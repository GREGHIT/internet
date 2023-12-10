<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <!-- Подключение CSS Bootstrap с CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Регистрация нового пользователя</h2>
        <form action="register.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Имя пользователя:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <!-- Другие поля регистрации -->

            <div class="mb-3">
                <label for="email" class="form-label">Email (логин):</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirm" class="form-label">Повторите пароль:</label>
                <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="full_name" class="form-label">ФИО:</label>
                <input type="text" id="full_name" name="full_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Дата рождения:</label>
                <input type="date" id="birthdate" name="birthdate" class="form-control">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Пол:</label>
                <select id="gender" name="gender" class="form-select">
                    <option value="Male">Мужской</option>
                    <option value="Female">Женский</option>
                    <option value="Other">Другой</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="interests" class="form-label">Интересы:</label>
                <textarea id="interests" name="interests" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="vk_profile" class="form-label">Ссылка на профиль ВК:</label>
                <input type="text" id="vk_profile" name="vk_profile" class="form-control">
            </div>

            <div class="mb-3">
                <label for="blood_group" class="form-label">Группа крови:</label>
                <input type="text" id="blood_group" name="blood_group" class="form-control">
            </div>

            <div class="mb-3">
                <label for="rhesus_factor" class="form-label">Резус-фактор:</label>
                <select id="rhesus_factor" name="rhesus_factor" class="form-select">
                    <option value="+">+</option>
                    <option value="-">-</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
        <p class="mt-3">Уже зарегистрированы? <a href="login.php">Авторизация</a></p>
    </div>
</body>
</html>
