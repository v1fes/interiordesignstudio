<h2>Список послуг</h2>
<?php if ($isAdmin): ?>
    <a href="http://localhost/InteriorDesignStudio/services/create" class="btn btn-primary mb-3">Створити послугу</a>
<?php endif; ?>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>Опис</th>
                <th>Ціна</th>
                <?php if ($isAdmin): ?>
                    <th>Дії</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
            <tr>
                <td><?= $service['ServiceID'] ?></td>
                <td><?= $service['ServiceName'] ?></td>
                <td><?= $service['Description'] ?></td>
                <td><?= $service['Price'] ?></td>
                <?php if ($isAdmin): ?>
                    <td>
                        <a href="http://localhost/InteriorDesignStudio/services/edit/<?= $service['ServiceID'] ?>" class="btn btn-warning">Редагувати</a>
                        <a href="http://localhost/InteriorDesignStudio/services/delete/<?= $service['ServiceID'] ?>" class="btn btn-danger">Видалити</a>
                    </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
