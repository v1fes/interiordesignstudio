<form action="" method="post" class="card p-4">
    <div class="mb-3">
        <label for="comment" class="form-label">Коментар:</label>
        <textarea id="comment" name="comment" class="form-control"><?= htmlspecialchars($comment['Comment']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Оновити коментар</button>
    <?php if (isset($error)): ?>
        <p class="text-danger"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</form>
