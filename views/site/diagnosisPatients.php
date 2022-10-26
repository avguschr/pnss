<h1 class="text-center" style="margin-bottom: 100px">Пациенты с диагнозом <?php echo $diagnosis->name ?></h1>

<div>
    <?php
    foreach ($diagnosis->patients as $d) {
        echo "<div class='card mb-3'>
 <div class='card-body d-flex justify-content-between'>
 <div>
 {$d->users[0]->name}
 {$d->users[0]->surname}
 {$d->users[0]->patronymic}
</div>
 </div>
 </div>";
    }
    ?>


</div>
