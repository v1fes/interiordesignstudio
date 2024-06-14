<?php /** @var array $invoice */ /** @var array $projects */ /** @var array $statuses */ ?>

<div class="card">
    <h2 class="card-header">Редагування інвойса</h2>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="projectID" class="form-label">Проект</label>
                <select class="form-control" id="projectID" name="projectID">
                    <?php foreach ($projects as $project): ?>
                        <option value="<?= htmlspecialchars($project['ProjectID']) ?>" <?= $project['ProjectID'] == $invoice['ProjectID'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($project['ProjectName']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="issueDate" class="form-label">Дата выдачи</label>
                <input type="date" class="form-control" id="issueDate" name="issueDate" value="<?= htmlspecialchars($invoice['IssueDate']) ?>">
            </div>
            <div class="mb-3">
                <label for="dueDate" class="form-label">Дата погашения</label>
                <input type="date" class="form-control" id="dueDate" name="dueDate" value="<?= htmlspecialchars($invoice['DueDate']) ?>">
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Сумма</label>
                <input type="number" class="form-control" id="amount" name="amount" value="<?= htmlspecialchars($invoice['Amount']) ?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Статус</label>
                <select class="form-control" id="status" name="status">
                    <?php foreach ($statuses as $status): ?>
                        <option value="<?= htmlspecialchars($status) ?>" <?= $status == $invoice['Status'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($status) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
</div>
