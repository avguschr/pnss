<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,
    //Классы для middleware
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'patient' => \Middlewares\PatientMiddleware::class,
        'admin' => \Middlewares\AdminMiddleware::class,
        'doctor' => \Middlewares\DoctorMiddleware::class,
        'patient-or-doctor' => \Middlewares\PatientDoctorMiddleware::class
    ],

    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'positive' => \Validators\PositiveNumberValidator::class,
        'birthday' => \Validators\BirthdayValidator::class,
        'russianLanguage' => \Validators\RussianLanguageValidator::class,
        'latin' => \Validators\LatinLettersValidator::class
    ],

    'routeAppMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
    ],

];
