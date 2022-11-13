<?php

use Src\Route;


Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/', [Controller\Site::class, 'home']);
Route::add('GET', '/services', [Controller\Site::class, 'services']);
Route::add('GET', '/signup-service', [Controller\Site::class, 'signupservice']);
Route::add('GET', '/patient', [Controller\Site::class, 'patient_diagnosis'])
    ->middleware('admin');
Route::add('GET', '/diagnosis', [Controller\Site::class, 'diagnosis_patient'])
    ->middleware('admin');
Route::add('GET', '/all-diagnosis', [Controller\Site::class, 'diagnosis']);
Route::add('GET', '/appointments', [Controller\Site::class, 'patient_appointments'])
    ->middleware('admin');
Route::add('GET', '/patients', [Controller\Site::class, 'patients'])
    ->middleware('admin');
Route::add('GET', '/doctors', [Controller\Site::class, 'doctors'])
    ->middleware('admin');
Route::add('GET', '/appointment', [Controller\Site::class, 'appointments'])
    ->middleware('admin');
Route::add(['GET', 'POST'], '/add-doctor', [Controller\Site::class, 'addDoctor'])
    ->middleware('admin');
Route::add(['GET', 'POST'], '/add-service', [Controller\Site::class, 'addService'])
    ->middleware('admin');
Route::add('GET', '/my-appointments', [Controller\Site::class, 'myAppointments'])
    ->middleware('patient-or-doctor');


