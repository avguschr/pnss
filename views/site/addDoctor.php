<div>
    <h1 class="text-center" style="margin-bottom: 100px">Регистрация врача</h1>
    <p style="color: red"><?php echo $message  ?? ''; ?></p>

    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" name="login" class="form-control" id="login" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите логин врача</div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите имя врача</div>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" name="surname" class="form-control" id="surname" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите фамилию врача</div>
        </div>

        <div class="mb-3">
            <label for="patronymic" class="form-label">Отчество</label>
            <input type="text" name="patronymic" class="form-control" id="patronymic" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите отчество врача</div>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Должность</label>
            <input type="text" name="position" class="form-control" id="position" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите должность врача</div>
        </div>

        <div class="mb-3">
            <label for="specialization" class="form-label">Специализация</label>
            <input type="text" name="specialization" class="form-control" id="specialization" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите специализацию врача</div>
        </div>

        <div class="mb-3">
            <label for="login" class="form-label">Дата рождения</label>
            <input type="date" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" name="birthday" class="form-control" id="patronymic" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите дату рождения врача</div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите пароль</div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary text-center">Зарегистрировать врача</button>
        </div>
    </form>
</div>