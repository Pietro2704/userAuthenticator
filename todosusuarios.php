<?php
include_once "comandos_SQL.php";
$usuarios = getUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Todos usuarios</title>
</head>
<body>
  <div class="container">
    <p>Seja bem-vindo</p>
    <h2>Listar usuario</h2>

    <table class="table table-bordered">
      <thead class="thead-dark">

        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Senha</th>
          <th>Ações</th>
        </tr>

      </thead>  

      <tbody>

        <?php
        foreach ($usuarios as $usuario):
        ?>

        <tr>
          <td><?php echo $usuario['id'] ?></td>
          <td><?php echo $usuario['usuario'] ?></td>
          <td><?php echo $usuario['email'] ?></td>
          <td><?php echo $usuario['senha'] ?></td>
          <td>
            <a class="btn btn-primary" href="editarUsuario.php?id=<?php echo $usuario['id'] ?>">Editar</a>
            <a class="btn btn-danger" href="excluirUsuario.php?id=<?php echo $usuario['id'] ?>">Excluir</a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>
