<h1 class="text-center" style="margin-bottom: 100px">Запись</h1>
<h3><?= $message ?? ''; ?></h3>

<?php
if (app()->auth::check()):
    ?>
    <form method="post">

        <div class="mb-3">
            <label for="form-select" class="form-label">Выберите услугу</label>
            <select class="form-select" id="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <div id="emailHelp" class="form-text">Введите пароль</div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary text-center">Войти</button>
        </div>
    </form>
<?php endif;