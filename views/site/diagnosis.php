<h1>Список статей</h1>
<ol>
   <?php
   foreach ($diagnosis as $d) {
       echo '<li>' . $d->name . '</li>';
   }
   ?>
</ol>

