<?php if(count($errors) !== 0): ?>
  <div class="errors">
    Hay errores en el formulario:
    <ul>
      <?php foreach($errors as $error): ?>
        <li><?= $error ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif; ?>