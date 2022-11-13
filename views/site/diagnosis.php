<h1 class="text-center" style="margin-bottom: 100px">Диагнозы</h1>

<?php
foreach ($diagnosis as $d): echo
<<<ITEM
    <div class='card mb-3'>
        <div class='card-header'>Диагноз</div>
        <div class='card-body'>
             <h5 class='card-title mb-3'>{$d->name}</h5>
             <a class='btn btn-primary' href="/diagnosis?id={$d->id}">Показать пациентов</a>
        </div>
    </div>
ITEM;
endforeach; ?>

