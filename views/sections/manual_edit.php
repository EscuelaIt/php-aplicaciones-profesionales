<?php $this->layout('layouts/layout', [
  'mainTitle' => 'Editar ' . $manual["title"],
]) ?>

<h1>Editar <?= $manual["title"] ?></h1>

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

<?php if($msg !== ''): ?>
  <div class="success">
    <?= $msg ?>
  </div>
<?php endif; ?>

<form action="/manuales/<?= $manual["slug"] ?>/editar" method="post">
  Título: <input type="text" name="title" value="<?= $data["title"] ?? $manual["title"] ?>">
  <br>
  Orden: <input type="text" name="order" value="<?= $data["order"] ?? $manual["order"] ?>">
  <br>
  <button>Enviar</button>
</form>


