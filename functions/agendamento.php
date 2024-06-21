<?php
// Verifica se a função solicitada existe e chama a função
if (isset($_GET['function']) && function_exists($_GET['function'])) {
  $function = $_GET['function'];
  $response = $function(); // Chama a função diretamente~

  echo json_encode($response); // Retorna a resposta em formato JSON

} else {
  echo json_encode(['error' => 'Função não encontrada ou não especificada.']);
}

function comboEspecialidade() {
  include("../db/conexao.php");

  $sql = "SELECT * FROM `especialidade`;";
  $rs = mysqli_query($conexao, $sql) or die("error retrieving data. " . mysqli_error($conexao));

  $especialidades = [];
  while ($row = mysqli_fetch_assoc($rs)) {
    $especialidades[] = $row;
  }

  // Retorna os dados em formato JSON
  header('Content-Type: application/json');
  return json_encode($especialidades);
}

function comboProfissional() {
  include("../db/conexao.php");

  $sql = "SELECT * FROM `profissional`;";
  $rs = mysqli_query($conexao, $sql) or die("error retrieving data. " . mysqli_error($conexao));

  $funcionarios = [];
  while ($row = mysqli_fetch_assoc($rs)) {
    $funcionarios[] = $row;
  }

  // Retorna os dados em formato JSON
  header('Content-Type: application/json');
  return json_encode($funcionarios);
}

function onSubmit() {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include("../db/conexao.php");

    // Escapar e formatar corretamente os valores para a consulta SQL
    $data = mysqli_real_escape_string($conexao, $_POST['data']);
    $especialidade = mysqli_real_escape_string($conexao, $_POST['especialidade']);
    $profissional = mysqli_real_escape_string($conexao, $_POST['profissional']);
    $cid = mysqli_real_escape_string($conexao, $_POST['cid']);

    $sql = "INSERT INTO `agenda` (`data`,`id_especialidade`,`id_profissional`,`cid`)
              VALUES ('$data', '$especialidade', '$profissional', '$cid');";

    $rs = mysqli_query($conexao, $sql) or die("Erro ao inserir usuário: " . mysqli_error($conexao));

    header('Content-Type: application/json');

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
}
