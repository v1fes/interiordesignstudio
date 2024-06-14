<?php /** @var array $service */ ?>

<div class="container">
    <div class="card">
        <h2 class="card-header">Видалення послуги</h2>
        <div class="card-body">
            <p>Ви впевнені, що хочете видалити послугу "<?= htmlspecialchars($service['ServiceName']) ?>"?</p>
            <form action="" method="post">
                <button class="btn btn-danger" type="submit">Видалити</button>
                <a href="http://localhost/InteriorDesignStudio/services/list" class="btn btn-secondary">Скасувати</a>
            </form>
        </div>
    </div>
</div>
