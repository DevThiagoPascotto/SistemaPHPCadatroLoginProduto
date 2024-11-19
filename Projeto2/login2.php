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
        <form method="POST">
            <div class="field">
                <label for="usuario">usuario</label>
                <input type="text" name="usuario">
            </div>

            <div class="field">
                <label for="senha">senha</label>
                <input type="password" name="senha">
            </div>

            <button type="submit">Login</button>
            <div class="field">
                <p class="text-center">
                    <a href="register.php" class="link">Novo usuário? Cadastre-se aqui</a>
                </p>
            </div>
        </form>


        <nav class="navbar">
            <a class="navbar-brand" href="#">Aula PW2</a>
        </nav>
</div>
</body>

</html>
<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verifica se o usuário existe no banco de dados
    $stmt = $pdo->prepare("SELECT id, senha FROM users WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário foi encontrado e se a senha está correta
    if ($user && password_verify($senha, $user['senha'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];  // Armazena o ID do usuário na sessão
        header("Location: index.php");  // Redireciona para index.php após login bem-sucedido
        exit;  // Para garantir que o código abaixo não seja executado após o redirecionamento
    } else {
        echo "Usuário ou senha inválidos.";
    }
}
?>