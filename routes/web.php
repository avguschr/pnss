<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('doctor');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/', [Controller\Site::class, 'home']);
Route::add('GET', '/services', [Controller\Site::class, 'services']);
Route::add('GET', '/signup-service', [Controller\Site::class, 'signupservice']);
Route::add('GET', '/patient', [Controller\Site::class, 'patient_diagnosis']);
Route::add('GET', '/diagnosis', [Controller\Site::class, 'diagnosis_patient']);
Route::add('GET', '/appointments', [Controller\Site::class, 'patient_appointments']);
Route::add('GET', '/appointment', [Controller\Site::class, 'appointments']);
Route::add('GET', '/my-appointments', [Controller\Site::class, 'myAppointments']);

