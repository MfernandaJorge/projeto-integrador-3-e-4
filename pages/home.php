<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home NJRN</title>

    <link rel="stylesheet" href="../style/home.css">
    <script type="text/javascript" src="../js/home.js"></script>
  </head>

  <?php 
    session_start();

    // Verificar se $_SESSION['user'] é igual a 0
    if ($_SESSION['tipo_user'] == 0) {
        $buttonVisibility = 'visible'; // Variável para controlar a visibilidade do botão
    } else {
        $buttonVisibility = 'hidden';
    }
  ?>
  <body>
    <div class="container">
      <h3 class="title">MENU:</h3>
        <button class="button-agendamento" type="submit" onclick="menu('agendamento'); return false">
          Solicitar Agendamento
        </button>
        <button class="button-perfil" type="submit" onclick="menu('perfil'); return false">
          Informações Cadastrais
        </button>
        <button class="button-agenda" type="submit" onclick="menu('agenda'); return false" style="visibility: <?php echo $buttonVisibility; ?>">
          Agenda
        </button>
    </div>

    <!-- RODAPÉ PADRÃO -->
    <footer class="footer">
      <img src="../images/logo-footer.png">
      <p>NRJN - Todos os direitos reservados</p>
      <a href="#">Políticas de privacidade</a>
    </footer>
  </body>
</html>