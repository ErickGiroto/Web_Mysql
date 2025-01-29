<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuário</title>
    <link rel="stylesheet" href="css/login_usuario.css">
</head>
<body class="gradient-bg">
    <div class="form-container glass-effect">
        <form action="login_usuario_processa.php" method="POST">
            <h2 class="form-title">Login de Usuário</h2>
            <input class="input-field" type="email" name="email" placeholder="E-mail" required>
            <input class="input-field" type="password" name="senha" placeholder="Senha" required>
            <button class="submit-button" type="submit">Entrar</button>
            <p class="forgot-password"><a class="link" href="recupera_usuario.php">Esqueceu sua senha?</a></p>
            <p class="forgot-password"><a class="link" href="cadastro_usuario.php">Não tem conta? Registre-se!</a></p>
        </form>
    </div>
</body>
</html>
