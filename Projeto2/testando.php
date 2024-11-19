<form method="POST">
    <div class="field padding-bottom--24">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" required>
    </div>

    <div class="field padding-bottom--24">
        <label for="senha">Senha</label>
        <input type="password" name="senha" required>
    </div>

    <!-- Botão para login ou registro -->
    <button type="submit" name="acao" value="login">Login</button>
    <button type="submit" name="acao" value="registrar">Registrar</button>
</form>

<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['usuario'];
    $senha = $_POST['senha'];
    $acao = $_POST['acao']; // Ação escolhida (login ou registrar)

    // Validação básica
    if (empty($user) || empty($senha)) {
        echo "Usuário e senha são obrigatórios.";
        exit;
    }

    if ($acao == 'registrar') {
        // Registra o novo usuário

        // Verifique se o usuário já existe
        $stmt = $pdo->prepare("SELECT * FROM users WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $user);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Usuário já existe. Escolha outro.";
        } else {
            // Hash da senha antes de armazenar
            $hashed_senha = password_hash($senha, PASSWORD_DEFAULT);

            // Inserir novo usuário
            $cad = $pdo->prepare("INSERT INTO users (usuario, senha) VALUES (:usuario, :senha)");
            $cad->bindParam(':usuario', $user);
            $cad->bindParam(':senha', $hashed_senha);
            
            if ($cad->execute()) {
                echo "Usuário registrado com sucesso!";
            } else {
                echo "Erro ao registrar o usuário.";
            }
        }
    } elseif ($acao == 'login') {
        // Realiza o login do usuário

        // Verifique se o usuário existe
        $stmt = $pdo->prepare("SELECT * FROM users WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $user);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Sucesso no login
            echo "Login bem-sucedido! Bem-vindo, " . htmlspecialchars($usuario['usuario']) . ".";
            // Você pode iniciar uma sessão aqui, se desejar manter o usuário logado
            session_start();
            $_SESSION['user_id'] = $usuario['id']; // Armazene o ID do usuário na sessão
            header("Location: index.php");
        } else {
            echo "Usuário ou senha inválidos.";
        }
    }
}
?>
