<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_usuario.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$conn = new mysqli("localhost", "root", "root", "system_brazil");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $rua = $_POST['rua'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $pergunta1 = $_POST['pergunta1'];
    $resposta1 = $_POST['resposta1'];
    $pergunta2 = $_POST['pergunta2'];
    $resposta2 = $_POST['resposta2'];
    $pergunta3 = $_POST['pergunta3'];
    $resposta3 = $_POST['resposta3'];

    $update_query = "UPDATE usuarios SET nome_completo=?, email=?, cpf=?, data_nascimento=?, rua=?, complemento=?, numero=?, bairro=?, cidade=?, estado=?, pais=?, celular=?, telefone=?, pergunta1=?, resposta1=?, pergunta2=?, resposta2=?, pergunta3=?, resposta3=? WHERE id=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssssssssssssssssssi", $nome_completo, $email, $cpf, $data_nascimento, $rua, $complemento, $numero, $bairro, $cidade, $estado, $pais, $celular, $telefone, $pergunta1, $resposta1, $pergunta2, $resposta2, $pergunta3, $resposta3, $usuario_id);
    
    if (!empty($senha)) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $update_query = "UPDATE usuarios SET senha=? WHERE id=?";
        $stmt_senha = $conn->prepare($update_query);
        $stmt_senha->bind_param("si", $senha_hash, $usuario_id);
        $stmt_senha->execute();
        $stmt_senha->close();
    }
    
    if ($stmt->execute()) {
        echo "<script>alert('Dados atualizados com sucesso!'); window.location.href='portal_usuario.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar os dados.'); window.location.href='portal_usuario_editar.php';</script>";
    }
    
    $stmt->close();
}
$conn->close();
?>
