<?php
// cadastro_usuario_processa.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta dos dados do formulário
    $nome = trim($_POST['nome_completo']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $cpf = trim($_POST['cpf']);
    $data_nascimento = $_POST['data_nascimento'];
    
    // Endereço
    $rua = trim($_POST['rua']);
    $numero = trim($_POST['numero']);
    $complemento = trim($_POST['complemento']) ?: null;
    $bairro = trim($_POST['bairro']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);
    $pais = trim($_POST['pais']);
    
    // Contato
    $celular = trim($_POST['celular']);
    $telefone = trim($_POST['telefone']) ?: null;
    
    // Perguntas de Segurança
    $pergunta1 = $_POST['pergunta1'];
    $resposta1 = $_POST['resposta1'];
    $pergunta2 = $_POST['pergunta2'];
    $resposta2 = $_POST['resposta2'];
    $pergunta3 = $_POST['pergunta3'];
    $resposta3 = $_POST['resposta3'];
    
    // Validação das Perguntas de Segurança (não devem ser iguais)
    if ($pergunta1 === $pergunta2 || $pergunta1 === $pergunta3 || $pergunta2 === $pergunta3) {
        die("Erro: As perguntas de segurança devem ser diferentes.");
    }
    
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "root", "system_brazil");
    
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Verificar se o e-mail já existe
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "<!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Erro no Cadastro</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
                * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
                body { display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(-45deg, #ff416c, #ff4b2b, #1e90ff, #2bff88); background-size: 400% 400%; animation: gradientBG 10s ease infinite; }
                @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
                .form-container { background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); text-align: center; width: 100%; max-width: 400px; }
                h2 { color: #fff; margin-bottom: 20px; font-weight: 600; }
                .message { color: #fff; font-size: 18px; margin: 20px 0; }
                .link { color: #ff416c; font-size: 16px; text-decoration: none; font-weight: bold; }
                .link:hover { text-decoration: underline; }
                .alink {color: white; text-decoration: none; font-weight: bold; transition: 0.3s;}
                .alink:hover {text-decoration: underline;}

            </style>
        </head>
        <body>
            <div class='form-container'>
                <h2>Erro no Cadastro</h2>
                <div class='message'>
                    <p>Este e-mail já está registrado. <a class='alink' href='login_usuario.php' class='link'>Faça login</a></p>
                </div>
            </div>
        </body>
        </html>";
        exit;
    }
    
    // Preparação da consulta
    $stmt = $conn->prepare("INSERT INTO usuarios 
        (nome_completo, email, senha, cpf, rua, numero, complemento, bairro, cidade, estado, pais, celular, telefone, data_nascimento, 
        pergunta1, resposta1, pergunta2, resposta2, pergunta3, resposta3) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Erro na preparação: " . $conn->error);
    }
    
    // Hash da senha e das respostas
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
    $resposta1_hash = password_hash($resposta1, PASSWORD_DEFAULT);
    $resposta2_hash = password_hash($resposta2, PASSWORD_DEFAULT);
    $resposta3_hash = password_hash($resposta3, PASSWORD_DEFAULT);
    
    // Bind dos parâmetros
    $stmt->bind_param(
        "ssssssssssssssssssss",
        $nome,
        $email,
        $senha_hash,
        $cpf,
        $rua,
        $numero,
        $complemento,
        $bairro,
        $cidade,
        $estado,
        $pais,
        $celular,
        $telefone,
        $data_nascimento,
        $pergunta1,
        $resposta1_hash,
        $pergunta2,
        $resposta2_hash,
        $pergunta3,
        $resposta3_hash
    );
    
    // Execução da consulta
    if ($stmt->execute()) {
        echo "<!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Cadastro Realizado</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
                * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
                body { display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(-45deg, #ff416c, #ff4b2b, #1e90ff, #2bff88); background-size: 400% 400%; animation: gradientBG 10s ease infinite; }
                @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
                .form-container { background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); text-align: center; width: 100%; max-width: 400px; }
                h2 { color: #fff; margin-bottom: 20px; font-weight: 600; }
                .message { color: #fff; font-size: 18px; margin: 20px 0; }
                .link { color: #ff416c; font-size: 16px; text-decoration: none; font-weight: bold; }
                .link:hover { text-decoration: underline; }
            </style>
        </head>
        <body>
            <div class='form-container'>
                <h2>Cadastro Realizado com Sucesso</h2>
                <div class='message'>
                    <p>Seu cadastro foi realizado com sucesso! <a href='login_usuario.php' class='link'>Faça login</a></p>
                </div>
            </div>
        </body>
        </html>";
    } else {
        // Mensagem de erro mais detalhada
        echo "Erro no cadastro: " . $stmt->error;
    }
    
    // Fechamento da conexão
    $stmt->close();
    $conn->close();
}
?>
