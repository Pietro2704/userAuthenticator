<?php
include_once "comandos_SQL.php";

// Verificar se o ID do usuário foi fornecido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obter os dados do usuário pelo ID
    $usuario = buscarUsuario($id);

    // Verificar se o usuário existe
    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit();
    }

    // Verificar se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter os dados do formulário
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $senha = $_POST["password"];

        // Atualizar os dados do usuário no banco de dados
        atualizarUsuario($id, $usuario, $email, $senha);

        // Redirecionar para a página de listagem de usuários
        echo "<script>window.location = 'todosusuarios.php';</script>";
        exit();
    }

    
} else {
    echo "ID do usuário não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Usuário</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="usuario" id="nome" value="<?php echo $usuario['usuario']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $usuario['email']; ?>">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="text" class="form-control" name="password" id="password" value="<?php echo $usuario['senha']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>