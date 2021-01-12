<?php

  require '../vendor/autoload.php';

  use League\Plates\Engine;

  $templates = new Engine('../views');

  echo $templates->render('pagina2');

  