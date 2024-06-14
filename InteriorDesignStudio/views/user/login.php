<?php
/** @var string|null $error */
/** @var array $model */
core\Core::getInstance()->pageParams['title'] = 'Вхід на сайт';
?>


<style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
<div class="container login-container">
    <div class="login-header">
        <h2 class="card-title">Увійти</h2>
    </div>
    <div class="card-body">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Ім'я користувача</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block">Увійти</button>
            </div>
        </form>
    </div>
</div>

