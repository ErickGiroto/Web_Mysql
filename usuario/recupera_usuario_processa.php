<?php
$conn = new mysqli("localhost", "root", "root", "system_brazil");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $resposta1 = trim($_POST['resposta1']);
    $resposta2 = trim($_POST['resposta2']);
    $resposta3 = trim($_POST['resposta3']);

    // Preparar a consulta para obter as respostas armazenadas no banco
    $stmt = $conn->prepare("SELECT resposta1, resposta2, resposta3 FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($resposta1_db, $resposta2_db, $resposta3_db);
    $stmt->fetch();
    $stmt->close();
    
    // Verificar se o e-mail existe no banco de dados
    if ($resposta1_db === null) {
        echo "E-mail não encontrado. <a href='recupera_usuario.php'>Tente novamente</a>";
        exit;
    }

    // Comparar as respostas diretamente (sem hash)
    if ($resposta1 === $resposta1_db && $resposta2 === $resposta2_db && $resposta3 === $resposta3_db) {
        echo "<!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Nova Senha</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
                * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
                body { display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(-45deg, #ff416c, #ff4b2b, #1e90ff, #2bff88); background-size: 400% 400%; animation: gradientBG 10s ease infinite; }
                @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
                .form-container { background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); text-align: center; width: 100%; max-width: 400px; }
                h2 { color: #fff; margin-bottom: 20px; font-weight: 600; }
                .input-field { width: 100%; padding: 12px; margin: 10px 0; border: none; border-radius: 8px; font-size: 16px; outline: none; }
                .input-field::placeholder { color: #999; }
                .submit-button { width: 100%; padding: 12px; background: #ff416c; border: none; border-radius: 8px; color: #fff; font-size: 18px; font-weight: bold; cursor: pointer; transition: 0.3s; margin-top: 20px; }
                .submit-button:hover { background: #ff4b2b; }
                .form-container a { color: #ff416c; text-decoration: none; font-size: 14px; }
            </style>
        </head>
        <body>
            <div class='form-container'>
                <form action='nova_senha.php' method='POST'>
                    <h2>Nova Senha</h2>
                    <input type='hidden' name='email' value='" . htmlspecialchars($email) . "'>
                    <input class='input-field' type='password' name='nova_senha' placeholder='Nova Senha' required>
                    <button class='submit-button' type='submit'>Alterar Senha</button>
                </form>
            </div>
        </body>
        </html>";
    } else {
        echo "Respostas incorretas. <a href='recupera_usuario.php'>Tente novamente</a>";
    }
}

$conn->close();
?>
