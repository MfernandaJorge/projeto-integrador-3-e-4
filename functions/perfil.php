<?php
header('Content-Type: application/json');

// Função para validar o login
function onSubmit($nome, $cpf, $data, $email, $senha, $tel, $cpf_r, $tel_r, $tipo_user, $crm) {
  include("../db/conexao.php");

  // Escapar e formatar corretamente os valores para a consulta SQL
  $nome = mysqli_real_escape_string($conexao, $nome);
  $cpf = mysqli_real_escape_string($conexao, $cpf);
  $data = mysqli_real_escape_string($conexao, $data);
  $email = mysqli_real_escape_string($conexao, $email);
  $senha = mysqli_real_escape_string($conexao, $senha);
  $tel = mysqli_real_escape_string($conexao, $tel);
  $cpf_r = mysqli_real_escape_string($conexao, $cpf_r);
  $tel_r = mysqli_real_escape_string($conexao, $tel_r);
  $tipo_user = mysqli_real_escape_string($conexao, $tipo_user);
  $crm = mysqli_real_escape_string($conexao, $crm);

  $sql = "INSERT INTO `usuario` (`nome`,`cpf`,`data`,`email`,`senha`,`tel`,`cpf_r`,`tel_r`, `tipo_user`)
            VALUES ('$nome', '$cpf', '$data', '$email', '$senha', '$tel', '$cpf_r', '$tel_r', '$tipo_user');";

  $rs = mysqli_query($conexao, $sql) or die("Erro ao inserir usuário: " . mysqli_error($conexao));

  $id_usuario = $conexao->insert_id;

  if ($tipo_user == 0) {
    $sql = "INSERT INTO `profissional` (`id_usuario`, `nome`, `crm`)
              VALUES ('$id_usuario', '$nome', '$crm');";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao inserir profissional: " . mysqli_error($conexao));
  }

  if ($rs) {
    return [
      'success' => true,
      'message' => 'Sucesso'
    ];

  } else {
    return [
      'success' => false,
      'message' => 'Erro ao inserir usuário'
    ];
  }
}

// Processamento da requisição
$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome      = $_POST['nome']      ?? '';
  $cpf       = $_POST['cpf']       ?? '';
  $data      = $_POST['data']      ?? '';
  $email     = $_POST['email']     ?? '';
  $senha     = $_POST['senha']     ?? '';
  $tel       = $_POST['tel']       ?? '';
  $cpf_r     = $_POST['cpf_r']     ?? '';
  $tel_r     = $_POST['tel_r']     ?? '';
  $tipo_user = $_POST['tipo_user'] ?? '';
  $crm       = $_POST['crm']       ?? '';

  $response = onSubmit($nome, $cpf, $data, $email, $senha, $tel, $cpf_r, $tel_r, $tipo_user, $crm);

} else {
  $response = [
    'success' => false,
    'message' => 'Método de solicitação inválido'
  ];
}

echo json_encode($response);