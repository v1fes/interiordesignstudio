<?php /** @var string $role */ ?>

<div class="card">
    <div class="card-body">
        <h2 class="card-title">Редагування ролі</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="roleName" class="form-label">Назва ролі</label>
                <input type="text" class="form-control" id="roleName" name="roleName" placeholder="" value="<?= $role['RoleName'] ?? '' ?>">
            </div>
            <div>
                <button class="btn btn-primary">Зберегти</button>
            </div>
        </form>
    </div>
</div>

