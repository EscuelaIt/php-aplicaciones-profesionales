<?php $this->layout('layouts/layout', [
  'mainTitle' => 'Home del proyecto',
]) ?>

<h1>Manuales</h1>

<?= $this->insert('partials/search-form') ?>

<p>
  <a href="/manuales/nuevo">Crear un manual</a>
</p>

<?php foreach($manuals as $manual): ?>
  <?= $this->insert('partials/manual-card', [
      "manual" => $manual,
  ]) ?>
<?php endforeach ?>

<?php $this->start('footerLinks') ?>
  <p>
    <a href="/otra/carpeta">Otra ruta</a> |
    <a href="/producto/1">Producto 1</a> |
    <a href="/producto/22">Producto 22</a>
    <a href="/producto/133">Producto 133</a>
  </p>
<?php $this->stop() ?>

