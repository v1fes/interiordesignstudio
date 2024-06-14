<?php /** @var array $invoice */ ?>

<h2>Деталі інвойсу</h2>
<div class="card">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Проект:</strong> <?= htmlspecialchars($invoice['ProjectID']) ?></li>
            <li class="list-group-item"><strong>Дата виписки:</strong> <?= htmlspecialchars($invoice['IssueDate']) ?></li>
            <li class="list-group-item"><strong>Дата сплати:</strong> <?= htmlspecialchars($invoice['DueDate']) ?></li>
            <li class="list-group-item"><strong>Сума:</strong> <?= htmlspecialchars($invoice['Amount']) ?></li>
            <li class="list-group-item"><strong>Статус:</strong> <?= htmlspecialchars($invoice['Status']) ?></li>
        </ul>
    </div>
    <div class="card-footer">
        <a href="http://localhost/InteriorDesignStudio/invoice/edit/<?= $invoice['InvoiceID'] ?>" class="btn btn-primary">Редагувати</a>
        <a href="http://localhost/InteriorDesignStudio/invoice/delete/<?= $invoice['InvoiceID'] ?>" class="btn btn-danger">Видалити</a>
        <a href="http://localhost/InteriorDesignStudio/invoice/list" class="btn btn-secondary">Повернутись до списку</a>
    </div>
</div>
