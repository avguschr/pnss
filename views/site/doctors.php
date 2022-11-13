<h1 class="text-center" style="margin-bottom: 100px">Врачи</h1>
<a class="btn btn-primary mb-3" href="/add-doctor">Добавить доктора</a>
<?php
foreach ($doctors as $patient): echo
<<<ITEM
    <div class='card mb-3'>
        <div class='card-header'>Врач</div>
        <div class='card-body'>
             <h5 class='card-title mb-3'>{$patient->surname} {$patient->name} {$patient->patronymic}</h5>
             <p>Должность: {$patient->position}</p>
             <p>Специализация: {$patient->specialization}</p>
             <button @click='showDataInput = !showDataInput' class='btn btn-primary'>{{!showDataInput ? 'Показать записи' : 'Отмена'}}</button>
               <div v-if='showDataInput'>
    <label for='inputPassword' class='col-form-label'>Введите дату</label>
    <div>
      <input v-model='date' type='date' class='form-control mb-3' id='inputPassword' required>
    </div>
    <a v-if="date" class='btn btn-primary' :href="'/appointment?id={$patient->id}&' + 'date=' + date">Показать записи на выбранное число</a>
  </div>
        </div>
    </div>
ITEM;
endforeach; ?>