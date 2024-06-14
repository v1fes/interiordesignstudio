<?php /** @var array $projects */ ?>
<?php /** @var array $statuses */ ?>

<div class="card">
    <h2 class="card-header">Створення рахунку</h2>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="projectID" class="form-label">Проект</label>
                <select class="form-select" id="projectID" name="projectID">
                    <?php foreach ($projects as $project): ?>
                        <option value="<?= htmlspecialchars($project['ProjectID']) ?>"><?= htmlspecialchars($project['ProjectName']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="issueDate" class="form-label">Дата видачі</label>
                <input type="date" class="form-control" id="issueDate" name="issueDate">
            </div>
            <div class="mb-3">
                <label for="dueDate" class="form-label">Дата погашення</label>
                <input type="date" class="form-control" id="dueDate" name="dueDate">
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Сума</label>
                <input type="number" class="form-control" id="amount" name="amount">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Статус</label>
                <select class="form-select" id="status" name="status">
                    <?php foreach ($statuses as $status): ?>
                        <option value="<?= htmlspecialchars($status) ?>"><?= htmlspecialchars($status) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Створити</button>
        </form>
    </div>
</div>
