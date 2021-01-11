<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spaghetti</title>
  <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
  <h1>Spaghetti PHP!!!</h1>

  <?php

  require '../vendor/autoload.php';

  use Carbon\Carbon;
  use Lib\Breadcrumbs;
  use Lib\Dates;

  $date = Carbon::now();
  echo $date->format('Y');

  Carbon::setLocale('es');
  $today = Carbon::now();
  $tomorrow = $today->addDays(1);
  echo $tomorrow->isoFormat('dddd DD [de] MMMM'); 

  // include '../Lib/Dates.php';
  // include '../Lib/Breadcrumbs.php';

  $crumbs = new Breadcrumbs();
  $crumbs->add('/link', 'Sección');
  $crumbs->show();
  ?>

  <p>
    Con PHP es fácil hacer Spaghetti Code y mezclar la presentación, el HTML con código PHP, lo que produce diversos problemas, afectando seriamente a la mantenibilidad de los proyectos.
  </p>
  <p>
    Pero en 
    <?= Dates::longDate(Dates::tomorrow()) ?> 
    lo vamos a solucionar.
  </p>

</body>
</html>