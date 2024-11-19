<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quiosque</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

  <div class="container">
    <form action="inserirproduto.php" method="post">

      <span>Entre na sua conta</span>

      <div class="field">
        <label for="name">Nome</label>
        <input type="text" name="name" required>
      </div>

      <div class="field">
        <label for="valor">valor</label>
        <input type="text" name="valor" required>
      </div>

      <div class="field">
        <label for="marca">marca</label>
        <input type="text" name="marca" required>
      </div>

    

      <div class="field padding-bottom--salvar">
        <input type="submit" name="submit" class="btn" value="Salvar">
      </div>

    </form>
  </div>

  <nav class="navbar">
    <a class="navbar-brand" href="#">Teste</a>
  </nav>

</body>

</html>