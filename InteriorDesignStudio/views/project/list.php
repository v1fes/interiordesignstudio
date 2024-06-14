<?php
/** @var array $projects */
/** @var \models\User|null $user */
?>

<h2 class="mb-4">Список проектів</h2>
<?php if ($user && $user->isAdmin()): ?>
    <a href="/project/create" class="btn btn-primary mb-3">Створити проект</a>
<?php endif; ?>

<div class="row row-cols-1 row-cols-md-2 g-4 mb-3">
    <?php foreach ($projects as $project): ?>
        <div class="col">
            <div class="card h-100">
                <img src="/files/projects/<?= htmlspecialchars($project['PhotoPath']) ?>" class="card-img-top" alt="<?= htmlspecialchars($project['ProjectName']) ?>" style="max-height: 150px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($project['ProjectName']) ?></h5>
                    <p class="card-text"><strong>Послуга:</strong> <?= htmlspecialchars($project['ServiceName']) ?></p>
                    <p class="card-text"><strong>Дата початку:</strong> <?= htmlspecialchars($project['StartDate']) ?></p>
                    <p class="card-text"><strong>Дата завершення:</strong> <?= htmlspecialchars($project['EndDate']) ?></p>
                    <a href="/project/view/<?= $project['ProjectID'] ?>" class="btn btn-info">Переглянути проект</a>
                </div>
                <?php if ($user && $user->isAdmin()): ?>
                    <div class="card-footer">
                        <a href="/project/edit/<?= $project['ProjectID'] ?>" class="btn btn-warning">Редагувати</a>
                        <a href="/project/delete/<?= $project['ProjectID'] ?>" class="btn btn-danger">Видалити</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
