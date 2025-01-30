<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_usuario.php"); // Se não estiver logado, redireciona para o login
    exit;
}

$nome_usuario = $_SESSION['nome_usuario']; // Recupera o nome do usuário da sessão
$usuario_id = $_SESSION['usuario_id']; // Recupera o id do usuário da sessão

// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "root", "system_brazil");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta para buscar as informações do usuário
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fechando a conexão com o banco de dados
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="css/portal_usuario_edita.css">
</head>

<body>
    <!-- Codigo para deixar o campo do nome na parte superior da pagina
    <div class="user-info">
        <span class="user-name">Olá, <?php echo htmlspecialchars($nome_usuario); ?>!</span>
        <a href="logout.php" class="logout-button">Sair</a>
    </div>

    -->

    <div class="container">
        <!-- Menu Lateral -->
        <div class="sidebar">
            <h2 class="sidebar-title"><span class="user-name">Olá, <?php echo htmlspecialchars($nome_usuario); ?>!</span></h2>
            <ul class="sidebar-list">
                <li><a class="sidebar-link" href="portal_usuario.php">Dashboard</a></li>
                <li><a class="sidebar-link" href="#">Ver Produtos</a></li>
                <li><a class="sidebar-link" href="#">Excluir Conta</a></li>
                <li><a class="sidebar-link" href="logout.php">Sair</a></li>
            </ul>
        </div>

        <!-- Formulário de Edição -->
        <div class="form-container">
            <h2>Editar Perfil</h2>

            <form action="portal_usuario_editar_processa.php" method="post">

            <!-- Exibição de mensagens de sucesso ou erro -->
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="success-message">
                        <?php 
                        echo $_SESSION['success_message']; 
                        unset($_SESSION['success_message']); // Remove a mensagem após exibição
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error_message'])): ?>
                    <div class="error-message">
                        <?php 
                        echo $_SESSION['error_message']; 
                        unset($_SESSION['error_message']); // Remove a mensagem após exibição
                        ?>
                    </div>
                <?php endif; ?>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="nome_completo" name="nome_completo" value="<?php echo htmlspecialchars($user['nome_completo']); ?>" placeholder="Nome Completo">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="E-mail">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="password" id="senha" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($user['cpf']); ?>" placeholder="CPF">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($user['data_nascimento']); ?>" placeholder="Data de Nascimento">
                    </div>
                    <div class="form-group">
                        <input type="text" id="rua" name="rua" value="<?php echo htmlspecialchars($user['rua']); ?>" placeholder="Rua">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="complemento" name="complemento" value="<?php echo htmlspecialchars($user['complemento']); ?>" placeholder="Complemento">
                    </div>
                    <div class="form-group">
                        <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($user['numero']); ?>" placeholder="Número">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($user['bairro']); ?>" placeholder="Bairro">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cidade" name="cidade" value="<?php echo htmlspecialchars($user['cidade']); ?>" placeholder="Cidade">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($user['estado']); ?>" placeholder="Estado">
                    </div>
                    <div class="form-group">
                        <input class="input-field" type="text" name="pais" value="<?php echo htmlspecialchars($user['pais']); ?>" placeholder="País" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input class="input-field" type="tel" name="celular" value="<?php echo htmlspecialchars($user['celular']); ?>" placeholder="Celular (xx) xxxxx-xxxx" pattern="\(\d{2}\) \d{5}-\d{4}" required>
                    </div>
                    <div class="form-group">
                        <input class="input-field" type="tel" name="telefone" value="<?php echo htmlspecialchars($user['telefone']); ?>" placeholder="Telefone (opcional)" pattern="\(\d{2}\) \d{4}-\d{4}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="label" for="pergunta1">Pergunta de Segurança 1</label>
                        <select class="select-field" name="pergunta1" required>
                            <option value="<?php echo htmlspecialchars($user['pergunta1']); ?>" selected><?php echo htmlspecialchars($user['pergunta1']); ?></option>
                            <option value="Qual é o nome do seu primeiro animal de estimação?">Qual é o nome do seu primeiro animal de estimação?</option>
                            <option value="Qual é o nome da sua mãe?">Qual é o nome da sua mãe?</option>
                            <option value="Qual foi o modelo do seu primeiro carro?">Qual foi o modelo do seu primeiro carro?</option>
                            <option value="Qual é o nome da sua cidade natal?">Qual é o nome da sua cidade natal?</option>
                            <option value="Qual é o nome do seu melhor amigo de infância?">Qual é o nome do seu melhor amigo de infância?</option>
                        </select>
                        <input class="input-field" type="text" name="resposta1" value="<?php echo htmlspecialchars($user['resposta1']); ?>" placeholder="Resposta" required>
                    </div>

                    <div class="form-group">
                        <label class="label" for="pergunta2">Pergunta de Segurança 2</label>
                        <select class="select-field" name="pergunta2" required>
                            <option value="<?php echo htmlspecialchars($user['pergunta2']); ?>" selected><?php echo htmlspecialchars($user['pergunta2']); ?></option>
                            <option value="Qual é o nome do seu primeiro animal de estimação?">Qual é o nome do seu primeiro animal de estimação?</option>
                            <option value="Qual é o nome da sua mãe?">Qual é o nome da sua mãe?</option>
                            <option value="Qual foi o modelo do seu primeiro carro?">Qual foi o modelo do seu primeiro carro?</option>
                            <option value="Qual é o nome da sua cidade natal?">Qual é o nome da sua cidade natal?</option>
                            <option value="Qual é o nome do seu melhor amigo de infância?">Qual é o nome do seu melhor amigo de infância?</option>
                        </select>
                        <input class="input-field" type="text" name="resposta2" value="<?php echo htmlspecialchars($user['resposta2']); ?>" placeholder="Resposta" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="label" for="pergunta3">Pergunta de Segurança 3</label>
                        <select class="select-field" name="pergunta3" required>
                            <option value="<?php echo htmlspecialchars($user['pergunta3']); ?>" selected><?php echo htmlspecialchars($user['pergunta3']); ?></option>
                            <option value="Qual é o nome do seu primeiro animal de estimação?">Qual é o nome do seu primeiro animal de estimação?</option>
                            <option value="Qual é o nome da sua mãe?">Qual é o nome da sua mãe?</option>
                            <option value="Qual foi o modelo do seu primeiro carro?">Qual foi o modelo do seu primeiro carro?</option>
                            <option value="Qual é o nome da sua cidade natal?">Qual é o nome da sua cidade natal?</option>
                            <option value="Qual é o nome do seu melhor amigo de infância?">Qual é o nome do seu melhor amigo de infância?</option>
                        </select>
                        <input class="input-field" type="text" name="resposta3" value="<?php echo htmlspecialchars($user['resposta3']); ?>" placeholder="Resposta" required>
                    </div>
                </div>


                <div class="form-row">
                    
                    <div class="form-group">
                        <label class="titulo" for="aviso">ATENÇÃO: Guarde suas senhas de recuperação! </label> <br><br>
                        <p class="fonte">Mantenha suas senhas de recuperação em um local seguro. Elas são essenciais para recuperar o acesso à sua conta em 
                            caso de perda, esquecimento ou problemas de login.
                            Uma vez perdido o acesso, sem as senhas de recuperação, pode ser impossível recuperar sua conta.</p>


                    </div>
                </div>






                

                <button type="submit">Salvar Alterações</button>
            </form>
        </div>
    </div>
</body>

</html>
