<?php $this->layout('layouts/layout', [
  'mainTitle' => 'Home del proyecto',
]) ?>

<h1>Separando las vistas</h1>

<p>Estamos haciendo la separación de las vistas.</p>

<?php $this->insert('partials/some-markup', ['courseTitle' => 'El titulo']); ?>

<?php $this->start('footerLinks') ?>
  <p>
    <a href="/otra/carpeta">Otra ruta</a> |
    <a href="/producto/1">Producto 1</a> |
    <a href="/producto/1">Producto 22</a>
  </p>
<?php $this->stop() ?>

