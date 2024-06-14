<?php
/** @var array $role */
?>
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Видалення ролі</h2>
        <p>Ви впевнені, що хочете видалити роль "<?= htmlspecialchars($role['RoleName']) ?>"?</p>
        <form action="" method="post">
            <button class="btn btn-danger" type="submit">Видалити</button>
            <a href="http://localhost/InteriorDesignStudio/role/list" class="btn btn-secondary">Скасувати</a>
        </form>
    </div>
</div>
