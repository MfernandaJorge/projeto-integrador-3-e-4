<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login NJRN</title>

    <link rel="stylesheet" href="../style/perfil-edit.css">
  </head>

  <body>
    <div class="container">
      <form id="login-form">
        <h3 class="title">Edite seu perfil aqui!</h3>

        <?php
          session_start();
          include("../db/conexao.php");

          $sql = "SELECT *
                  FROM `usuario` `user` 
                  WHERE `user`.`id_usuario` = '{$_SESSION['id_usuario']}';";

          $rs = mysqli_query($conexao, $sql) or die("error retrieving data. " . mysqli_error($conexao));
          $data = mysqli_fetch_assoc($rs);
        ?>

        <!-- FORM DE LOGIN -->
        <div class="form-group">
          <input value="Nome: <?php echo htmlspecialchars($data['nome']);?>" disabled>
          <input value="CPF: <?php echo htmlspecialchars($data['cpf']);?>" disabled>
          <input value="Data de Nascimento: <?php echo htmlspecialchars($data['data']);?>" disabled>
          <input value="Email: <?php echo htmlspecialchars($data['email']);?>" disabled>
          <input value="Telefone: <?php echo htmlspecialchars($data['tel']);?>" disabled>
          <input value="CPF do Responsável: <?php echo htmlspecialchars($data['cpf_r']);?>" disabled>
          <input value="Telefone do Responsável: <?php echo htmlspecialchars($data['tel_r']);?>" disabled>
          <!-- <input type="number"   placeholder="CRM: "                     value="<?php $data['crm']?>" disabled> -->
        </div>

        <!-- ENCAMINHA PARA FORM DE CADASTRO OU ALTERAR SENHA -->
        <div class="form-group">
        </div>
      </form>
    </div>

    <!-- RODAPÉ PADRÃO -->
    <footer class="footer">
      <img src="../images/logo-footer.png">
      <p>NRJN - Todos os direitos reservados</p>
      <a href="#">Políticas de privacidade</a>
    </footer>
  </body>
</html>