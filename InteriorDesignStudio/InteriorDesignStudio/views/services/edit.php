<?php /** @var array $service */ ?>

<div class="container">
    <div class="card">
        <h2 class="card-header">Редагування послуги</h2>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="ServiceName" class="form-label">Назва послуги</label>
                    <input type="text" class="form-control" id="ServiceName" name="ServiceName" value="<?= htmlspecialchars($service['ServiceName']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Description" class="form-label">Опис</label>
                    <textarea class="form-control" id="Description" name="Description" required><?= htmlspecialchars($service['Description']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="Price" class="form-label">Ціна</label>
                    <input type="number" step="0.01" class="form-control" id="Price" name="Price" value="<?= htmlspecialchars($service['Price']) ?>" required>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </form>
        </div>
    </div>
</div>
