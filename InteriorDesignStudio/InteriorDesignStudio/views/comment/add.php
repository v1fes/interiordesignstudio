<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Додати коментар</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="comment" class="form-label">Коментар:</label>
                    <textarea id="comment" name="comment" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Додати коментар</button>
                <?php if (isset($error)): ?>
                    <div class="mt-3">
                        <p class="text-danger"><?= htmlspecialchars($error) ?></p>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
