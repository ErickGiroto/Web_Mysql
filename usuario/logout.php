<?php
session_start();
session_destroy();  // Destroi a sessão
header("Location: login_usuario.php");  // Redireciona para a página de login
exit();
?>
