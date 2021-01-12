<?php $this->layout('layouts/layout', [
  'mainTitle' => 'Página 2'
]) ?>

<h1>Hola</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque fuga voluptates commodi beatae harum. Sit debitis expedita pariatur explicabo laborum nesciunt nulla esse aliquid incidunt, aliquam asperiores rerum ducimus et.</p>

<ul>
  <li>item 1</li>
  <li>item 2</li>
  <li>item 3</li>
  <li>item 4</li>
</ul>

<?php $this->start('footerLinks') ?>
  <p>
    <a href="#">Link 0</a> |
    <a href="#">Link 1</a> |
    <a href="#">Link 2</a>
  </p>
<?php $this->stop() ?>

<?php $this->start('footerJS') ?>
  <script></script>
<?php $this->stop() ?>