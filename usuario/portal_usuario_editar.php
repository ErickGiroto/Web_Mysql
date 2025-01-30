<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_usuario.php"); // Se não estiver logado, redireciona para o login
    exit;
}

$nome_usuario = $_SESSION['nome_usuario']; // Recupera o nome do usuário da sessão
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
    <div class="user-info">
        <span class="user-name">Olá, <?php echo htmlspecialchars($nome_usuario); ?>!</span>
        <a href="logout.php" class="logout-button">Sair</a>
    </div>


    <div class="container">
        <!-- Menu Lateral -->
        <div class="sidebar">
            <h2 class="sidebar-title">Menu</h2>
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

            <form action="#" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="E-mail">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="password" id="senha" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cpf" name="cpf" placeholder="CPF">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento">
                    </div>
                    <div class="form-group">
                        <input type="text" id="rua" name="rua" placeholder="Rua">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="complemento" name="complemento" placeholder="Complemento">
                    </div>
                    <div class="form-group">
                        <input type="text" id="numero" name="numero" placeholder="Número">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="bairro" name="bairro" placeholder="Bairro">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cidade" name="cidade" placeholder="Cidade">
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group">
                        <input type="text" id="estado" name="estado" placeholder="Estado">
                    </div>

                    <div class="form-group">
                        <input class="input-field" type="text" name="pais" placeholder="País" required>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group">
                        <input class="input-field" type="tel" name="celular" placeholder="Celular (xx) xxxxx-xxxx" pattern="\(\d{2}\) \d{5}-\d{4}" required>
                    </div>

                    <div class="form-group">
                        <input class="input-field" type="tel" name="telefone" placeholder="Telefone (opcional)" pattern="\(\d{2}\) \d{4}-\d{4}">
                    </div>
                </div>



                <div class="form-row">

                    <div class="form-group">
                        <label class="label" for="pergunta1">Pergunta 1</label>
                        <select class="select-field" name="pergunta1" required>
                            <option value="">Selecione uma pergunta</option>
                            <option value="Qual é o nome do seu primeiro animal de estimação?">Qual é o nome do seu primeiro animal de estimação?</option>
                            <option value="Qual é o nome da sua mãe?">Qual é o nome da sua mãe?</option>
                            <option value="Qual foi o modelo do seu primeiro carro?">Qual foi o modelo do seu primeiro carro?</option>
                            <option value="Qual é o nome da sua cidade natal?">Qual é o nome da sua cidade natal?</option>
                            <option value="Qual é o nome do seu melhor amigo de infância?">Qual é o nome do seu melhor amigo de infância?</option>
                        </select>
                        <input class="input-field" type="text" name="resposta1" placeholder="Resposta" required>
                    </div>

                    <div class="form-group">
                    <label class="label" for="pergunta2">Pergunta 2</label>
                        <select class="select-field" name="pergunta2" required>
                            <option value="">Selecione uma pergunta</option>
                            <option value="Qual é o nome do seu primeiro animal de estimação?">Qual é o nome do seu primeiro animal de estimação?</option>
                            <option value="Qual é o nome da sua mãe?">Qual é o nome da sua mãe?</option>
                            <option value="Qual foi o modelo do seu primeiro carro?">Qual foi o modelo do seu primeiro carro?</option>
                            <option value="Qual é o nome da sua cidade natal?">Qual é o nome da sua cidade natal?</option>
                            <option value="Qual é o nome do seu melhor amigo de infância?">Qual é o nome do seu melhor amigo de infância?</option>
                        </select>
                        <input class="input-field" type="text" name="resposta2" placeholder="Resposta" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                    <label class="label" for="pergunta3">Pergunta 3</label>
                        <select class="select-field" name="pergunta3" required>
                            <option value="">Selecione uma pergunta</option>
                            <option value="Qual é o nome do seu primeiro animal de estimação?">Qual é o nome do seu primeiro animal de estimação?</option>
                            <option value="Qual é o nome da sua mãe?">Qual é o nome da sua mãe?</option>
                            <option value="Qual foi o modelo do seu primeiro carro?">Qual foi o modelo do seu primeiro carro?</option>
                            <option value="Qual é o nome da sua cidade natal?">Qual é o nome da sua cidade natal?</option>
                            <option value="Qual é o nome do seu melhor amigo de infância?">Qual é o nome do seu melhor amigo de infância?</option>
                        </select>
                        <input class="input-field" type="text" name="resposta3" placeholder="Resposta" required>
                    </div>

                    <div class="form-group">
                    </div>

                </div>

                



                



                



                <button type="submit">Salvar Alterações</button>
            </form>
        </div>
    </div>
</body>

</html>