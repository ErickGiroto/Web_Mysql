<?php
session_start();
$conn = new mysqli("localhost", "root", "root", "system_brazil");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT id, nome_completo, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nome_completo, $senha_hash);
        $stmt->fetch();

        if (password_verify($senha, $senha_hash)) {
            $_SESSION['usuario_id'] = $id;
            $_SESSION['nome_usuario'] = $nome_completo;
            $_SESSION['expire_time'] = time() + 3600; // 1 hora de validade
            header("Location: portal_usuario.php");
            exit;
        } else {
            echo "<!DOCTYPE html>
            <html lang='pt-br'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Erro de Login</title>
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
                    <h2>Erro de Login</h2>
                    <div class='message'>
                        <p>Senha incorreta. <a href='login_usuario.php' class='link'>Tente novamente</a></p>
                    </div>
                </div>
            </body>
            </html>";
        }
    } else {
        echo "<!DOCTYPE html>
        <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Erro de Login</title>
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
                <h2>Erro de Login</h2>
                <div class='message'>
                    <p>E-mail não encontrado. <a href='login_usuario.php' class='link'>Tente novamente</a></p>
                </div>
            </div>
        </body>
        </html>";
    }

    $stmt->close();
}
$conn->close();
?>

