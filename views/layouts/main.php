<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <title>Pop it MVC</title>
</head>
<body class="d-flex flex-column min-vh-100">
<header style="margin-bottom: 100px">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= app()->route->getUrl('/') ?>">Поликлиника №66</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= app()->route->getUrl('/') ?>">Главная</a>
                    </li>
                    <?php
                    if (!app()->auth::check()):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= app()->route->getUrl('/login') ?>">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
                    </li>
                    <?php
                        else:
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= app()->route->getUrl('/logout') ?>">Выход</a>
                    </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= app()->route->getUrl('/my-appointments') ?>">Мои записи</a>
                            </li>
                        <?php
                    endif;
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= app()->route->getUrl('/services') ?>">Услуги</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main style="margin-bottom: 250px">
    <div class="container">
        <?= $content ?? '' ?>
    </div>
</main>
<footer class="bg-light navbar-fixed-bottom mt-auto w-auto p-5">
    <div class="row">
        <div class="col text-center p-0">
            <h3 class="mb-3">Контакты</h3>
            <p class="fs-5">Тел.: 8-888-888-88-88</p>
            <p class="fs-5">г.Томск, ул. Алтайская, д. 888 </p>
        </div>
        <div class="col text-center p-0">
            <h3 class="mb-3">График</h3>
            <p class="fs-5">пн-пт 8:00 - 20:00
            </p>
            <p class="fs-5">сб 9:00 - 18:00
            </p>
            <p class="fs-5">вс 9:00 - 15:00
            </p>
        </div>
        <div class="col text-center p-0">
            <h3 class="mb-3">Социальные сети</h3>
            <p><a href="https://vk.com/" class="fs-5 text-body text-decoration-none">ВКонтакте</a></p>
            <p><a href="https://ok.ru/" class="fs-5 text-body text-decoration-none">Одноклассники</a></p>
        </div>
    </div>
</footer>
<script
        src="https://kit.fontawesome.com/f5e9404b16.js"
        crossorigin="anonymous"
></script>
</body>
</html>