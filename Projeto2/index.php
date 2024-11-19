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
        <form action="inserirCheck.php" method="post">

            <span>Entre na sua conta</span>

            <div class="field">
                <label for="name">Nome</label>
                <input type="text" name="name" required>
            </div>

            <div class="field">
                <label for="idade">Idade</label>
                <input type="text" name="idade" required>
            </div>

            <div class="field field-checkbox">
                <label for="abrir">
                    <input type="checkbox" name="abrir"> Abrir os cadeados da lona
                </label>
            </div>

            <div class="field field-checkbox">
                <label for="dobrar">
                    <input type="checkbox" name="dobrar"> Dobrar lona
                </label>
            </div>

            <div class="field padding-bottom--salvar">
                <input type="submit" name="submit" class="btn" value="Salvar">
            </div>

        </form>
    </div>

    <nav class="navbar">
        <a class="navbar-brand" href="#">Quiosque Morumbi TELEFONE: (11)5555-5555</a>
    </nav>

</body>

</html>
