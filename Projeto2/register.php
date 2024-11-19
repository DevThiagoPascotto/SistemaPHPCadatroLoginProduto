
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiosque</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>


<form method="POST">
            
<div class="field padding-bottom--24">
                  <label for="usuario">usuario</label>
                  <input type="text" name="usuario">
                </div>

                <div class="field padding-bottom--24">
                  <label for="senha">senha</label>
                  <input type="password" name="senha">
                </div>

    
    <button type="submit">Registrar</button>
</form>
</div>

<nav class="navbar">
    <a class="navbar-brand" href="#">Quiosque Morumbi TELEFONE: (11)5555-5555</a>
</nav>

</body>

</html>


<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter e limpar dados de entrada
    $user = trim($_POST['usuario']);
    $senhas = trim($_POST['senha']);
    
    // Prepara a consulta para evitar SQL Injection
    $cad = $pdo->prepare("INSERT INTO users (usuario, senha) VALUES (:usuario, :senha)");
    // Usa a função password_hash para armazenar senhas de forma segura
    $hashed_senha = password_hash($senhas, PASSWORD_DEFAULT);

    // Vincula os parâmetros e executa a consulta
    $cad->bindParam(':usuario', $user);
    $cad->bindParam(':senha', $hashed_senha);

    if ($cad->execute()) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro ao registrar usuário.";
    }
}
?>