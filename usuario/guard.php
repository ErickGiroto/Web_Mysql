<?php session_start();

if ($_SERVER['REQUEST_METHOD']==='POST') {
    // Conexão com o banco
    $conn =new mysqli("localhost", "root", "root", "system_brazil");

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    $email =$_POST['email'];
    $nova_senha =trim($_POST['nova_senha']);

    if ( !empty($nova_senha)) {
        // Criptografa a senha
        $senha_hash =password_hash($nova_senha, PASSWORD_DEFAULT);

        // Atualiza a senha no banco de dados
        $stmt =$conn->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
        $stmt->bind_param("ss", $senha_hash, $email);

        if ($stmt->execute()) {
            echo "Senha alterada com sucesso! <a href='login_usuario.php'>Faça login</a>";
        }

        else {
            echo "Erro ao atualizar a senha. Tente novamente.";
        }

        $stmt->close();
    }

    else {
        echo "A nova senha não pode estar vazia.";
    }

    $conn->close();
}

?>