<h2>Коментарі до проекту</h2>
<div class="project-comments">
    <?php if (!empty($comments)): ?>
        <?php foreach ($comments as $comment): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text"><strong>Автор:</strong> <?= htmlspecialchars($comment['Author']) ?></p>
                    <p class="card-text"><?= nl2br(htmlspecialchars($comment['Comment'])) ?></p>
                    <p class="card-text"><em>Дата:</em> <?= htmlspecialchars($comment['DateCreated']) ?></p>
                    <a href="/comment/edit/<?= htmlspecialchars($comment['CommentID']) ?>" class="btn btn-warning">Редагувати</a>
                    <a href="/comment/delete/<?= htmlspecialchars($comment['CommentID']) ?>" class="btn btn-danger">Видалити</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Коментарів поки що немає.</p>
    <?php endif; ?>
</div>
<a href="/comment/add/<?= htmlspecialchars($projectID) ?>" class="btn btn-primary">Додати коментар</a>
