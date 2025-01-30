<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="css/portal_usuario_edita.css">
</head>

<body>
    <div class="container">
        <!-- Menu Lateral -->
        <div class="sidebar">
            <h2 class="sidebar-title">Menu</h2>
            <ul class="sidebar-list">
                <li><a class="sidebar-link" href="portal_usuario.php">Dashboard</a></li>
                <li><a class="sidebar-link" href="#">Ver Produtos</a></li>
                <li><a class="sidebar-link" href="logout.php">Sair</a></li>
            </ul>
        </div>

        <!-- Formulário de Edição -->
        <div class="form-container">
            <h2>Editar Perfil</h2>

            <form action="#" method="post">
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="E-mail">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="password" id="senha" name="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cpf" name="cpf" placeholder="CPF">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento">
                    </div>
                    <div class="form-group">
                        <input type="text" id="rua" name="rua" placeholder="Rua">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="complemento" name="complemento" placeholder="Complemento">
                    </div>
                    <div class="form-group">
                        <input type="text" id="numero" name="numero" placeholder="Número">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="bairro" name="bairro" placeholder="Bairro">
                    </div>
                    <div class="form-group">
                        <input type="text" id="cidade" name="cidade" placeholder="Cidade">
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" id="estado" name="estado" placeholder="Estado">
                </div>

                <button type="submit">Salvar Alterações</button>
            </form>
        </div>
    </div>
</body>

</html>
