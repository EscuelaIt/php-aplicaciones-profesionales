<?php $this->layout('layouts/layout', [
  'mainTitle' => 'Crear un nuevo manual',
]) ?>

<h1>Nuevo manual</h1>

<?= $this->insert('partials/errors', [ 'errors' => $errors ]) ?>

<?= $this->insert('sections/manuals/partials/manual-form', [
  'data' => $data,
  'manual' => [],
  'action' => $action,
]); ?>