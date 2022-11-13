<h1 class="text-center" style="margin-bottom: 100px">Вход</h1>
<p style="color: red"><?php echo $message  ?? ''; ?></p>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" name="login" class="form-control" id="login" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите логин</div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Введите пароль</div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary text-center">Войти</button>
        </div>
    </form>
<?php endif;
