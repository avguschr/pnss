<h1 class="text-center" style="margin-bottom: 100px">Записи к <?php

    use Model\User;
    echo $doctor->name;
    echo ' ';
    echo $doctor->surname;
    echo ' ';
    echo $doctor->patronymic;
    ?></h1>

<div>
    <?php

    foreach ($appointments as $a) {
        $time = strtotime($a->date);
        $user = User::find($a->patient_id);
        $newformat = date('d.m.Y',$time);

        echo "
    
     <div class='card text-bg-warning mb-3'>
        <div class='card-header'>$newformat</div>
        <div class='card-body'>
             <h5 class='card-title'>Пациент: {$user->name} {$user->surname} {$user->patronymic}</h5>
        </div>
    </div>

";
    }
    ?>


</div>
