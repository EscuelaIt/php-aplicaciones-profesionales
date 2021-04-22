<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $mainTitle ?></title>
  <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
  <header>
    <a href="/"><img src="/assets/images/logo.svg" alt="Logo"></a>
  </header>

  <main>
    <?= $this->section('content') ?>
  </main>
  <footer>
    © Copyright 2021... EscuelaIT
    <?= $this->section('footerLinks') ?>
  </footer>

</body>
</html>


