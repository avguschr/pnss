<h1 class="text-center" style="margin-bottom: 100px">Мои записи
    <?php

    use Model\User;
    date_default_timezone_set('Asia/Tomsk');

    ?></h1>

<div>
    <?php

    foreach ($patient->appointments as $a) {
        $time = strtotime($a->date);
        $user = User::find($a->doctor_id);
        $newformat = date('d.m.Y',$time);

        if ($newformat > date('d.m.Y', time())) {
            echo "
    
     <div class='card text-bg-warning mb-3'>
        <div class='card-header'>$newformat</div>
        <div class='card-body'>
             <h5 class='card-title'>Врач: {$user->name} {$user->surname} {$user->patronymic}</h5>
        </div>
    </div>

";
        }

    }
    ?>

</div>