<?php
/** @var array $user */
?>

<style>
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>

<div class="container profile-container">
    <h2 class="profile-header">Оновити профіль</h2>
    <form method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Ім'я користувача</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['Username']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Електронна пошта</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['Email']) ?>" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-block">Зберегти зміни</button>
        </div>
    </form>
</div>
