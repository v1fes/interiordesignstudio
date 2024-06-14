<?php /** @var array $clients */ ?>
<?php /** @var array $services */ ?>

<div class="container container-form mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Створення проекту</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="clientID" class="form-label">Клієнт</label>
                    <select class="form-control" id="clientID" name="clientID" required>
                        <?php foreach ($clients as $client): ?>
                            <option value="<?= $client['UserID'] ?>"><?= htmlspecialchars($client['Username']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="serviceID" class="form-label">Послуга</label>
                    <select class="form-control" id="serviceID" name="serviceID" required>
                        <?php foreach ($services as $service): ?>
                            <option value="<?= $service['ServiceID'] ?>"><?= htmlspecialchars($service['ServiceName']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="projectName" class="form-label">Назва проекту</label>
                    <input type="text" class="form-control" id="projectName" name="projectName" required>
                </div>
                <div class="mb-3">
                    <label for="startDate" class="form-label">Дата початку</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                </div>
                <div class="mb-3">
                    <label for="endDate" class="form-label">Дата завершення</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <input type="text" class="form-control" id="status" name="status" required>
                </div>
                <div class="mb-3">
                    <label for="budget" class="form-label">Бюджет</label>
                    <input type="number" class="form-control" id="budget" name="budget" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Фотографія проекту</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Створити проект</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .container-form {
        max-width: 600px;
    }
    .card {
        margin-top: 50px;
    }
</style>
