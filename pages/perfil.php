<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login NJRN</title>

    <link rel="stylesheet" href="../style/perfil.css">
    <script type="text/javascript" src="../js/perfil.js"></script>
  </head>

  <body>
    <div class="container">
      <form id="login-form">
        <h3 class="title">Cadastre-se aqui!</h3>

        <!-- FORM DE LOGIN -->
        <div class="form-group">
          <input type="text"     placeholder="Nome: "                    id="nome" required>
          <input type="text"     placeholder="CPF: "                     id="cpf" required>
          <input type="date"     title="Data de Nascimento: "            id="data" required>
          <input type="email"    placeholder="Email: "                   id="email" required>
          <input type="password" placeholder="Insira uma senha: "        id="senha" required>
          <input type="number"   placeholder="Telefone: "                id="tel" required>

          <select id="tipo_user">
            <option  value="" disabled selected> Tipo de usuário </option>
            <option value="0">Profissional</option>
            <option value="1">Paciente</option>
          </select>

          <input type="text"     placeholder="CPF do Responsável: "      id="cpf_r" required disabled>
          <input type="number"   placeholder="Telefone do Responsável: " id="tel_r" required disabled>
          <input type="number"   placeholder="CRM: " id="crm" disabled>

          <input class="button" type="submit" onclick="onSubmit(); return false;" placeholder="Editar">
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              const tipo_user = document.getElementById('tipo_user');
              const crm = document.getElementById('crm');
              const cpf_r = document.getElementById('cpf_r');
              const tel_r = document.getElementById('tel_r');

              // Adicionar um ouvinte de evento para monitorar mudanças no campo1
              tipo_user.addEventListener('input', function() {

                // Verificar se campo1 está preenchido
                if (tipo_user.value == 0) {
                  crm.disabled = false; // Habilitar crm
                  cpf_r.disabled = true; // Habilitar cpf_r
                  tel_r.disabled = true; // Habilitar tel_r

                } else {
                  crm.disabled = true; // Desabilitar crm
                  cpf_r.disabled = false; // Habilitar cpf_r
                  tel_r.disabled = false; // Habilitar tel_r
                }
              });
            });
          </script>
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