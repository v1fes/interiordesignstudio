<div class="card">
    <div class="card-body">
        <h2 class="card-title">Створення ролі</h2>
        <?php if (isset($params['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $params['error'] ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="roleName">Назва ролі</label>
                <input type="text" class="form-control" id="roleName" name="roleName" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Створити роль</button>
        </form>
    </div>
</div>
