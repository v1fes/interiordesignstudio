<div class="container">
    <div class="card">
        <h2 class="card-header">Створення послуги</h2>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="ServiceName" class="form-label">Назва послуги</label>
                    <input type="text" class="form-control" id="ServiceName" name="ServiceName" required>
                </div>
                <div class="mb-3">
                    <label for="Description" class="form-label">Опис</label>
                    <textarea class="form-control" id="Description" name="Description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="Price" class="form-label">Ціна</label>
                    <input type="number" step="0.01" class="form-control" id="Price" name="Price" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Створити</button>
                </div>
            </form>
        </div>
    </div>
</div>
