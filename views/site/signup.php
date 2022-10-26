<div>
    <h1 class="text-center" style="margin-bottom: 100px">Регистрация</h1>
    <h3><?= $message ?? ''; ?></h3>


    <form method="post">
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" name="login" class="form-control" id="login" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите логин</div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите свое имя</div>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" name="surname" class="form-control" id="surname" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите свою фамилию</div>
        </div>

        <div class="mb-3">
            <label for="patronymic" class="form-label">Отчество</label>
            <input type="text" name="patronymic" class="form-control" id="patronymic" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите своё отчество</div>
        </div>

        <div class="mb-3">
            <label for="login" class="form-label">Дата рождения</label>
            <input type="date" max="<?php echo date(""); ?>" name="birthday" class="form-control" id="patronymic" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите дату своего рождения</div>
        </div>

        <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" required>
        <div id="emailHelp" class="form-text">Введите пароль</div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary text-center">Зарегистрироваться</button>
        </div>
    </form>
</div>
