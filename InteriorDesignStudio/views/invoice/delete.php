<?php /** @var array $invoice */ ?>

<div class="card">
    <h2 class="card-header">Видалення інвойсу</h2>
    <div class="card-body">
        <p class="card-text">Ви впевнені, що хочете видалити інвойс на суму "<?= htmlspecialchars($invoice['Amount']) ?>"?</p>
        <form action="" method="post">
            <button type="submit" class="btn btn-danger">Видалити</button>
            <a href="/invoice/list" class="btn btn-secondary">Скасувати</a>
        </form>
    </div>
</div>
