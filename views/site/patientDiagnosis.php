<h1 class="text-center" style="margin-bottom: 100px">Диагнозы <?php
    echo $patient[0]->name;
    echo " ";
    echo $patient[0]->surname;
    echo " ";
    echo $patient[0]->patronymic;
    ?></h1>

    <div>
        <?php
        foreach ($user->diagnosis as $d) {
            echo "<div class='card mb-3'>
 <div class='card-body d-flex justify-content-between'>
 <div>
 $d->name
</div>
 </div>
 </div>";
        }
        ?>


    </div>
