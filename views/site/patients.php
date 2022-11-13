<h1 class="text-center" style="margin-bottom: 100px">Пациенты</h1>
<?php
foreach ($patients as $patient) {
    echo "<div class='card mb-3'>
        <div class='card-header'>Пациент</div>
        <div class='card-body'>
             <h5 class='card-title mb-3'>{$patient->surname} {$patient->name} {$patient->patronymic}</h5>
             <a class='btn btn-primary' href='/patient?id={$patient->id}'>Диагнозы пациента</a>
             <a class='btn btn-primary' href='/appointments?id={$patient->id}'>Записи пациента</a>
        </div>
    </div>";
}