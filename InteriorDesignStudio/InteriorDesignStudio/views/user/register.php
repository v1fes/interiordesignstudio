<?php
/** @var array $errors */
/** @var array $model */

core\Core::getInstance()->pageParams['title'] = 'Реєстрація на сайті';

?>

<style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>

<div class="container register-container">
    <h2 class="register-header">Реєстрація</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post" onsubmit="return validatePassword();">
        <div class="mb-3">
            <label for="username" class="form-label">Ім'я користувача</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
    <label for="confirmPassword" class="form-label">Підтвердіть пароль</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
</div>

        <div class="mb-3">
            <label for="email" class="form-label">Електронна пошта</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-block">Зареєструватися</button>
        </div>
    </form>
</div>


<script>
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        if (password != confirmPassword) {
            alert("Пароль і підтвердження пароля не співпадають!");
            return false;
        }
        return true;
    }
</script>
