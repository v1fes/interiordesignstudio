<?php 
/** @var array $project */ 
/** @var array $projectService */ 
/** @var array $comments */ 
/** @var \models\User|null $user */
?>

<div class="container mt-4">
    <?php if (!empty($project['PhotoPath'])): ?>
        <div class="row mb-4">
            <div class="col-12">
                <img src="/files/projects/<?= htmlspecialchars($project['PhotoPath']) ?>" alt="Фото проекту" class="img-fluid project-photo" style="width: 100%; cursor: pointer;">
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="project-details mb-4">
                <h2 class="mb-4"><?= htmlspecialchars($project['ProjectName']) ?></h2>
                <p><strong>Послуга:</strong> <?= htmlspecialchars($projectService['ServiceName']) ?></p>
                <p><strong>Дата початку:</strong> <?= htmlspecialchars($project['StartDate']) ?></p>
                <p><strong>Дата закінчення:</strong> <?= htmlspecialchars($project['EndDate']) ?></p>
                <p><strong>Статус:</strong> <?= htmlspecialchars($project['Status']) ?></p>
                <p><strong>Бюджет:</strong> <?= htmlspecialchars($project['Budget']) ?></p>
            </div>
            <div class="text-center mb-4">
                <?php if ($user && $user->isAdmin()): ?>
                    <a href="/project/edit/<?= $project['ProjectID'] ?>" class="btn btn-primary">Редагувати</a>
                    <a href="/project/delete/<?= $project['ProjectID'] ?>" class="btn btn-danger">Видалити</a>
                <?php endif; ?>
                <a href="/project/list" class="btn btn-secondary">Повернутись до списку</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Коментарі до проекту</h3>
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment mb-3">
                                <p><strong>Автор:</strong> <?= htmlspecialchars($comment['Author']) ?></p>
                                <p><?= nl2br(htmlspecialchars($comment['Comment'])) ?></p>
                                <p><em>Дата:</em> <?= htmlspecialchars($comment['DateCreated']) ?></p>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Коментарів поки що немає.</p>
                    <?php endif; ?>
                    <a href="/projectcomment/add/<?= $project['ProjectID'] ?>" class="btn btn-primary mt-3">Додати коментар</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="photoModal" class="modal" style="display:none;">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImg">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const img = document.querySelector('.project-photo');
        const modal = document.getElementById('photoModal');
        const modalImg = document.getElementById('modalImg');
        const closeBtn = document.querySelector('.close');

        if (img) {
            img.onclick = function() {
                modal.style.display = 'block';
                modalImg.src = this.src;
            }
        }

        closeBtn.onclick = function() {
            modal.style.display = 'none';
        }

        modal.onclick = function() {
            modal.style.display = 'none';
        }
    });
</script>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.9);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    .modal-content, .close {
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @keyframes zoom {
        from {transform: scale(0)}
        to {transform: scale(1)}
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
</style>
