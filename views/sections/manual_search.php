<?php $this->layout('layouts/layout', [
  'mainTitle' => 'Búsqueda de manuales',
]) ?>

<?= $this->insert('partials/search-form'); ?>

<?php if(count($manuals) === 0): ?>
  <p>No hemos encontrado manuales relacionados con tu búsqueda.</p>
<?php else: ?>

  <?php if($query === ''): ?>
    <p>No hemos recibido ningún criterio de búsqueda, se muestran todos los manuales.</p>
  <?php else: ?>
    <p>Buscando manuales de <b><?= $query ?></b>. Hemos encontrado <?= count($manuals) ?> manuales relacionados.
  <?php endif; ?>

  
  <?php foreach($manuals as $manual): ?>
    <?= $this->insert('partials/manual-card', [
      "manual" => $manual,
    ]) ?>
  <?php endforeach; ?>
  
<?php endif; ?>