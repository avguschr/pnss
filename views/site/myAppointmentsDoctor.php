<h1 class="text-center" style="margin-bottom: 100px">Мои записи
    <?php

    use Model\User;
    date_default_timezone_set('Asia/Tomsk');

    ?></h1>

<div>
    <?php

    foreach ($doctor->appointments as $a) {
        $time = strtotime($a->date);
        $user = User::find($a->patient_id);
        $newformat = date('d.m.Y',$time);

        if ($newformat > date('d.m.Y', time())) {
            echo "
    
     <div class='card text-bg-warning mb-3'>
        <div class='card-header'>$newformat</div>
        <div class='card-body'>
             <h5 class='card-title'>Пациент: {$user->name} {$user->surname} {$user->patronymic}</h5>
        </div>
    </div>

";
        }
        else {
            echo "
    
     <div class='card text-bg-danger mb-3'>
        <div class='card-header'>$newformat</div>
        <div class='card-body'>
             <h5 class='card-title'>Пациент: {$user->name} {$user->surname} {$user->patronymic}</h5>
             <p>Прошедшая запись</p>
        </div>
    </div>

";
        }

    }
    ?>

</div>