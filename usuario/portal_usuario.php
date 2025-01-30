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
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/portal_usuario.css">
</head>

<body>
    <div class="container">
        <!-- Menu Lateral -->
        <div class="sidebar">
            <h2 class="sidebar-title"><span class="user-name">Olá, <?php echo htmlspecialchars($nome_usuario); ?>!</span></h2>
            <ul class="sidebar-list">
                <li><a class="sidebar-link" href="portal_usuario_editar.php">Editar Perfil</a></li>
                <li><a class="sidebar-link" href="#">Ver Produtos</a></li>
                <li><a class="sidebar-link" href="#">Excluir Conta</a></li>
                <li><a class="sidebar-link" href="logout.php">Sair</a></li>
            </ul>
        </div>

        <!-- Conteúdo Principal -->
        <div class="main-content">
            <h1 class="main-title">Bem-vindo(a), <?php echo htmlspecialchars($nome_usuario); ?>!</h1>
            <p class="main-description">O que você gostaria de fazer hoje?</p>

            <div class="actions">
                <a href="portal_usuario_editar.php" class="action-button">Gerenciar Conta</a>
                <a href="#" class="action-button">Ver Produtos</a>
                <a href="logout.php" class="action-button logout">Sair</a>
            </div>
        </div>
    </div>
</body>

</html>