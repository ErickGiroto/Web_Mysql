<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login_usuario.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "root", "system_brazil");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se há dados enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = $_POST['nome_completo'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $rua = $_POST['rua'] ?? '';
    $complemento = $_POST['complemento'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $pais = $_POST['pais'] ?? '';
    $celular = $_POST['celular'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $pergunta1 = $_POST['pergunta1'] ?? '';
    $resposta1 = $_POST['resposta1'] ?? '';
    $pergunta2 = $_POST['pergunta2'] ?? '';
    $resposta2 = $_POST['resposta2'] ?? '';
    $pergunta3 = $_POST['pergunta3'] ?? '';
    $resposta3 = $_POST['resposta3'] ?? '';

    $query = "UPDATE usuarios SET nome_completo=?, email=?, cpf=?, data_nascimento=?, rua=?, complemento=?, numero=?, bairro=?, cidade=?, estado=?, pais=?, celular=?, telefone=?, pergunta1=?, resposta1=?, pergunta2=?, resposta2=?, pergunta3=?, resposta3=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssssssssssssssi", $nome_completo, $email, $cpf, $data_nascimento, $rua, $complemento, $numero, $bairro, $cidade, $estado, $pais, $celular, $telefone, $pergunta1, $resposta1, $pergunta2, $resposta2, $pergunta3, $resposta3, $usuario_id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Seus dados foram atualizados com sucesso!";
    } else {
        $_SESSION['error_message'] = "Erro ao atualizar os dados. Tente novamente.";
    }
    $stmt->close();
}
$conn->close();

header("Location: portal_usuario_editar.php");
exit;
?>
