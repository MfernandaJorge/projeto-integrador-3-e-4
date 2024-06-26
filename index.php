<?php
include("db/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login NJRN</title>

    <link rel="stylesheet" href="style/login.css">
    <script type="text/javascript" src="js/login.js"></script>
  </head>

  <body>
    <div class="container">
      <form id="login-form" method="POST" action="javascript:login();"">
        <h3 class="title">Seja bem-vindo(a) ao NJRN! Seu sistema de agendamento de medicação injetável a domicílio!</h3>

        <!-- FORM DE LOGIN -->
        <div class="form-group">
          <input type="text" placeholder="Email ou CPF" id="cpf-email" required>
          <input type="password" placeholder="Senha" id="senha" required>

          <input class="button" type="submit" placeholder="Enviar">
        </div>

        <!-- ENCAMINHA PARA FORM DE CADASTRO OU ALTERAR SENHA -->
        <div class="form-group">
          <a class="link-login" href="#"><b>Esqueceu a senha?</b></a>
          <a class="link-login" href="../projeto-integrador/pages/perfil.php"><b>Cadastre-se!</b></a>
        </div>
      </form>
    </div>

    <!-- RODAPÉ PADRÃO -->
    <footer class="footer">
      <img src="images/logo-footer.png">
      <p>NRJN - Todos os direitos reservados</p>
      <a href="#">Políticas de privacidade</a>
    </footer>
  </body>
</html>