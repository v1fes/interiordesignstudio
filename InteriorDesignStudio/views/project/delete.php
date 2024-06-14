<?php /** @var int $projectID */ ?>

<div class="container container-delete mt-4">
    <div class="card border-danger">
        <div class="card-body">
            <h2 class="card-title text-danger">Видалення проекту</h2>
            <form action="" method="post">
                <p class="card-text">Ви впевнені, що хочете видалити цей проект? Це дія не може бути скасована.</p>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-danger">Так, видалити</button>
                    <a href="/project/list" class="btn btn-secondary">Скасувати</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .container-delete {
        max-width: 500px;
    }
    .card {
        margin-top: 50px;
    }
</style>
