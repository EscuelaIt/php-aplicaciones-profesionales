<?php $this->layout('layouts/layout', [
  'mainTitle' => 'Editar ' . $manual["title"],
]) ?>

<h1>Editar <?= $manual["title"] ?></h1>

<?= $this->insert('partials/errors', [ 'errors' => $errors ]) ?>

<?php if($msg !== ''): ?>
  <div class="success">
    <?= $msg ?>
  </div>
<?php endif; ?>

<?= $this->insert('sections/manuals/partials/manual-form', [
  'data' => $data,
  'manual' => $manual,
  'action' => $action,
]); ?>


