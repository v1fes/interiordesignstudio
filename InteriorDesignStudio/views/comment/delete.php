<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <p class="card-text">Ви впевнені, що хочете видалити цей коментар?</p>
            <form action="" method="post">
                <button type="submit" class="btn btn-danger">Видалити</button>
                <a href="/project/view/<?= htmlspecialchars($comment['ProjectID']) ?>" class="btn btn-secondary">Скасувати</a>
            </form>
        </div>
    </div>
</div>
