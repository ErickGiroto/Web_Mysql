<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/cadastro_usuario.css">
</head>
<body class="gradient-bg">
    <div class="form-wrapper">
        <div class="form-container glass-effect">
            <form action="cadastro_usuario_processa.php" method="POST">
                <h2 class="form-title">Cadastro de Usuário</h2>

                <div class="form-grid">
                    <!-- Coluna 1 -->
                    <div class="form-column">
                        <input class="input-field" type="text" name="nome_completo" placeholder="Nome Completo" required>
                        <input class="input-field" type="email" name="email" placeholder="E-mail" required>
                        <input class="input-field" type="password" name="senha" placeholder="Senha" required>
                        <input class="input-field" type="text" name="cpf" placeholder="CPF (xxx.xxx.xxx-xx)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
                        <input class="input-field" type="date" name="data_nascimento" required>

                        <!-- Endereço -->
                        <input class="input-field" type="text" name="rua" placeholder="Rua" required>
                        <input class="input-field" type="text" name="complemento" placeholder="Complemento">
                        <input class="input-field" type="text" name="numero" placeholder="Número" required>
                        <input class="input-field" type="text" name="bairro" placeholder="Bairro" required>
                        <input class="input-field" type="text" name="cidade" placeholder="Cidade" required>
                        <input class="input-field" type="text" name="estado" placeholder="Estado" required>
                        

                    </div>

                    <!-- Coluna 2 -->
                    <div class="form-column">
                        <input class="input-field" type="text" name="pais" placeholder="País" required>
                        <input class="input-field" type="tel" name="celular" placeholder="Celular (xx) xxxxx-xxxx" pattern="\(\d{2}\) \d{5}-\d{4}" required>
                        <input class="input-field" type="tel" name="telefone" placeholder="Telefone (opcional)" pattern="\(\d{2}\) \d{4}-\d{4}">
                        
                        <!-- Perguntas de Segurança -->
                        <h3 class="section-title">Perguntas de Segurança</h3>
                        
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
                </div>

                <button class="submit-button" type="submit">Cadastrar</button>
                <br><br>
                <p class="forgot-password"><a class="link" href="recupera_usuario.php">Esqueceu sua senha?</a></p>
                <br>
                <p class="forgot-password"><a class="link" href="login_usuario.php">Já possui cadastro? Clique aqui</a></p>
            </form>
        </div>
    </div>
</body>
</html>
