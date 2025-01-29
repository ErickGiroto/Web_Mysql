<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha - Usuário</title>
    <link rel="stylesheet" href="css/recuperacao_senha.css">
</head>
<body class="gradient-bg">
    <div class="form-wrapper">
        <div class="form-container glass-effect">
            <form action="recupera_usuario_processa.php" method="POST">
                <h2 class="form-title">Recuperação de Senha</h2>

                <input class="input-field" type="email" name="email" placeholder="E-mail" required>

                <h3 class="section-title">Perguntas de Segurança</h3>

                <label class="label" for="resposta1">Resposta para a Pergunta 1</label>
                <input class="input-field" type="text" name="resposta1" required>

                <label class="label" for="resposta2">Resposta para a Pergunta 2</label>
                <input class="input-field" type="text" name="resposta2" required>

                <label class="label" for="resposta3">Resposta para a Pergunta 3</label>
                <input class="input-field" type="text" name="resposta3" required>

                <button class="submit-button" type="submit">Recuperar Senha</button>
                <br><br>
                <p class="forgot-password"><a class="link" href="login_usuario.php">Já possui cadastro? Clique aqui</a></p> <br>
                <p class="forgot-password"><a class="link" href="cadastro_usuario.php">Não tem conta? Registre-se!</a></p>

            </form>
        </div>
    </div>
</body>
</html>
