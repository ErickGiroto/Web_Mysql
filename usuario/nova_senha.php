<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexão com o banco
    $conn = new mysqli("localhost", "root", "root", "system_brazil");

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $nova_senha = trim($_POST['nova_senha']);

    if (!empty($nova_senha)) {
        // Criptografa a senha
        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        // Atualiza a senha no banco de dados
        $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
        $stmt->bind_param("ss", $senha_hash, $email);

        if ($stmt->execute()) {
            echo "<!DOCTYPE html>
            <html lang='pt-br'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Senha Alterada</title>
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
                    <h2>Senha Alterada</h2>
                    <div class='message'>
                        <p>Sua senha foi alterada com sucesso!</p>
                        <p><a href='login_usuario.php' class='link'>Clique aqui para fazer login.</a></p>
                    </div>
                </div>
            </body>
            </html>";
        } else {
            echo "Erro ao atualizar a senha. Tente novamente.";
        }

        $stmt->close();
    } else {
        echo "A nova senha não pode estar vazia.";
    }

    $conn->close();
}
?>
