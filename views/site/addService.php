<div>
    <h1 class="text-center" style="margin-bottom: 100px">Добавление услуги</h1>
    <p style="color: red"><?php echo $message  ?? ''; ?></p>

    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите название услуги</div>
        </div>

        <div class="mb-3">
            <label for="cost" class="form-label">Стоимость</label>
            <input type="number" min="1" name="cost" class="form-control" id="cost" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите стоимость услуги</div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary text-center">Добавить услугу</button>
        </div>
    </form>
</div>