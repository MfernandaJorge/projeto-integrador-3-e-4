<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login NJRN</title>

    <link rel="stylesheet" href="../style/agendamento.css">
    <script type="text/javascript" src="../js/agendamento.js"></script>
  </head>

  <body>
    <div class="container">
      <form id="agenda-form" method="POST">
        <h3 class="title">Realize seus agendamentos aqui!</h3>

        <!-- FORM DE AGENDAMENTO -->
        <div class="form-group">
          <input type="date" placeholder="Data do agendamento" id="data" required>

          <select id="especialidade" required>
            <option value="" disabled selected><b>Selecione uma especialidade</b></option> 
            <option value=""><script>comboEspecialidade()</script></option>
          </select>

          <select id="profissional" required>
            <option value="" disabled selected><b>Selecione um profissional</b></option>
            <option value=""><script>comboProfissional()</script></option>
          </select>

          <input type="text" placeholder="CID" id="cid" required>

          <input class="button" type="submit" onclick="onSubmit(); return false" placeholder="Enviar">
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
