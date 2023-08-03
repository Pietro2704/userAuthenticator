<?php 
require_once "conexao.php"; // Chama o arquivo onde a função de conexao ao banco foi estabelecida

function criarUsuario($newusername,$newpassword,$email){ // Função para o Cadastro precisa receber um usuario, senha e um email

  $conn = conectarBanco(); // Conecta ao banco
  $sql = "select * from usuarios where usuario = '$newusername'"; // Comando de consulta para verificar se usuário ja existe
  $resultado = $conn->query($sql); // Executa o comando de consulta

  if ($resultado->num_rows > 0){ // Se o Banco retornar alguma linha
    echo "<script>alert('usuario ja cadastrado');</script>"; // Alerta que usuario ja existe
  }
  else{ // Senão

    $sql = "insert into usuarios(usuario,senha,email) values('$newusername','$newpassword','$email' )"; // Comando de inserção
    $resultado = $conn->query($sql); // Executa o comando de inserção

    if($resultado){ // Se a inserção foi bem-sucedida
      echo "<script>alert('Usuario criado com sucesso')</script>"; // Alerta que usuario foi criado
      echo "<script>window.location = 'todosusuarios.php';</script>"; // Redireciona para a página dos usuarios
    }
    else{ // Senão
      die("erro".mysql_connect_error()); // Encerra a execução do script e exibe a mensagem de erro
    } 
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
        <h1 class= "mt-5 mb-4">cadastrar</h1>
        <form action= "cadastro.php" method=POST>

          <div class= "form-group">
            <label for="username">usuario</label>
            <input type= "text" class="form-control" name="newusername" id='username'required> 
          </div>

          <div class="form-group">
            <label for="password"> senha</label>
            <input type= "password" class="form-control" name="newpassword" id= "password" required> 
          </div>

          <div class= "form-group">
            <label for="email">E-mail</label>
            <input type= "text" class="form-control" name="email" id='email'> 
          </div>

          <button type="submit" name="submit" class="btn btn-primary">Entrar</button>
          
        </form>
        <a href="index.php">Já possui conta?</a>
      </div>
    </div>
  </div>
</body>
</html>

<?php
if(isset($_POST["submit"])){ // Quando 'submit' for clicado
  $newusername = $_POST ["newusername"]; // Obtém o valor do campo 'newusername' do formulário
  $newpassword = $_POST ["newpassword"]; // Obtém o valor do campo 'newpassword' do formulário
  $email = $_POST["email"]; // Obtém o valor do campo 'email' do formulário

  criarUsuario($newusername,$newpassword,$email); // Chama a função passando os valores de usuário, senha e email como argumentos
}
?>