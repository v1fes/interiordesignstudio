<h2>Список інвойсів</h2>

<table class="table" id="invoicesTable">
    <thead>
        <tr>
            <th onclick="sortTable(0)">ID інвойсу</th>
            <th onclick="sortTable(1)">ID проекту</th>
            <th onclick="sortTable(2)">Назва проекту</th>
            <th onclick="sortTable(3)">Дата видачі</th>
            <th onclick="sortTable(4)">Дата сплати</th>
            <th onclick="sortTable(5)">Сума</th>
            <th onclick="sortTable(6)">Статус</th>
            <th>Дії</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?= htmlspecialchars($invoice['InvoiceID']) ?></td>
                <td><?= htmlspecialchars($invoice['ProjectID']) ?></td>
                <td><?= htmlspecialchars($invoice['ProjectName']) ?></td>
                <td><?= htmlspecialchars($invoice['IssueDate']) ?></td>
                <td><?= htmlspecialchars($invoice['DueDate']) ?></td>
                <td><?= htmlspecialchars($invoice['Amount']) ?></td>
                <td><?= htmlspecialchars($invoice['Status']) ?></td>
                <td>
                    <a href="/invoice/edit/<?= $invoice['InvoiceID'] ?>" class="btn btn-warning">Редагувати</a>
                    <a href="/invoice/delete/<?= $invoice['InvoiceID'] ?>" class="btn btn-danger">Видалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/invoices/create" class="btn btn-primary">Створити новий інвойс</a>

<script>
    function sortTable(columnIndex) {
        const table = document.getElementById("invoicesTable");
        const tbody = table.tBodies[0];
        const rows = Array.from(tbody.rows);
        const isNumericColumn = !isNaN(rows[0].cells[columnIndex].innerText);
        
        const compare = (a, b) => {
            const aText = a.cells[columnIndex].innerText.trim();
            const bText = b.cells[columnIndex].innerText.trim();
            return isNumericColumn ? parseFloat(aText) - parseFloat(bText) : aText.localeCompare(bText);
        };

        rows.sort(compare);

        rows.forEach(row => tbody.appendChild(row));
    }
</script>
