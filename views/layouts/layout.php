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
    <img src="/assets/images/logo.svg" alt="Logo">
  </header>

  <main>
    <?= $this->section('content') ?>
  </main>
  <footer>
    © Copyright... EscuelaIT
    <?= $this->section('footerLinks') ?>
  </footer>

</body>
</html>


