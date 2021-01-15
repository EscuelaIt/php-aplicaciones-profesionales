<form action="<?= $action ?>" method="post">
  Título: <input type="text" name="title" value="<?= $data["title"] ?? $manual["title"] ?>">
  <br>
  Orden: <input type="text" name="order" value="<?= $data["order"] ?? $manual["order"] ?>">
  <br>
  <button>Enviar</button>
</form>