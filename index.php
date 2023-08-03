<?php
require_once "conexao.php"; // Chama o arquivo onde a função de conexao ao banco foi estabelecida

function autenticarUsuario($username,$password){ // Função para o Login precisa receber um usuario e uma senha

  $conn = conectarBanco(); // Conecta ao banco
  $sql = "select * from usuarios where usuario = '$username' and senha = '$password' "; // Comando de consulta
  $resultado = $conn->query($sql); // Executa o comando de consulta
  
  if ($resultado->num_rows > 0) { // Se o Banco retornar alguma linha
    header('Location: todosusuarios.php'); // Redireciona para a página dos usuarios
  }
  else{ // Senão
    echo "<script>alert('Recusado');</script>"; // Alerta que não encontrou o usuario
  }
}
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
    <title>Pagina inicial</title>
</head>
<body>
  <div class= "container">
    <div class= "row justify-content-center">

      <div class= "col-md-6">
        <h1 class= "mt-5 mb-4">login</h1>
        <form action="index.php" method=POST>

          <div class="form-group">
            <label for="username">usuario</label>
            <input type= "text" class="form-control" name="username" id="username" required> 
          </div>

          <div class="form-group">
            <label for="password">senha</label>
            <input type= "password" class="form-control" name="password" id="password" required> 
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Entrar</button>
          
        </form>
        <a href="cadastro.php">Não possui conta?</a>
      </div>
    </div>
  </div>
</body>
</html>

<?php
if(isset($_POST["submit"])){ // Quando 'submit' for clicado
  $username = $_POST["username"]; // Obtém o valor do campo 'username' do formulário
  $password = $_POST["password"]; // Obtém o valor do campo 'password' do formulário

  autenticarUsuario($username,$password); // Chama a função passando os valores do usuário e senha como argumentos
}
?>