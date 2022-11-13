<h1 class="text-center" style="margin-bottom: 100px">Услуги</h1>
<a class="btn btn-primary mb-3" href="/add-service">Добавить услугу</a>
<div>
    <?php
    foreach ($services as $s) {
        echo "<div class='card mb-3'>
 <div class='card-body d-flex justify-content-between'>
 <div>
 $s->name
</div>
<div>
$s->cost р.
</div>
 </div>
 </div>";
    }
    ?>


</div>
