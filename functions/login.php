<?php
header('Content-Type: application/json');

// Função para validar o login
function validateLogin($username, $password) {
  include("../db/conexao.php");

  $sql = "SELECT `user`.`id_usuario`, `user`.`tipo_user`
          FROM `usuario` `user` 
          WHERE (`user`.`cpf` = '{$username}' OR `user`.`email` = '{$username}') AND (`user`.`senha` = '{$password}');";

  $rs = mysqli_query($conexao, $sql) or die("error retrieving data. " . mysqli_error($conexao));
  $data = mysqli_fetch_assoc($rs);

  if ($data) {
    session_start();
    $_SESSION['id_usuario'] = $data['id_usuario'];
    $_SESSION['tipo_user'] = $data['tipo_user'];

    return [
      'success' => true,
      'message' => 'Login bem-sucedido'
    ];

  } else {
    return [
      'success' => false,
      'message' => 'Nome de usuário ou senha inválidos'
    ];
  }
}

// Processamento da requisição
$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // file_put_contents('debug.log', 'post request received' . PHP_EOL, FILE_APPEND);
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  $response = validateLogin($username, $password);

} else {
  $response = [
    'success' => false,
    'message' => 'Método de solicitação inválido'
  ];
}

echo json_encode($response);