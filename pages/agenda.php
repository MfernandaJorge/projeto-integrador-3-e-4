<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login NJRN</title>

    <link rel="stylesheet" href="../style/agenda.css">
    <!-- <script type="text/javascript" src="../js/perfil.js"></script> -->
  </head>

  <body>
    <div class="container">
      <form id="login-form">
        <h3 class="title">Sua agenda aqui!</h3>

        <?php
          // session_start();
          // include("../db/conexao.php");

          // $sql = "SELECT *
          //         FROM `agenda` `ag`;";

          // $rs = mysqli_query($conexao, $sql) or die("error retrieving data. " . mysqli_error($conexao));
          // $data = mysqli_fetch_assoc($rs);
        ?>

        <div class="conteiner-table">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Data</th>
                        <th>Profissional</th>
                        <th>Especialidade</th>
                        <th>CID</th>
                        <th>Paciente</th>
                    </tr>
                </thead>
            
                <tbody>
                    <?php
                      include("../db/conexao.php");
                      session_start();

                      $sql = "SELECT  
                                `a`.`id_agenda`,
                                DATE_FORMAT(`a`.`data`, '%d/%m/%Y') AS `data`,
                                `p`.`nome` AS `nome_profissional`,
                                `u`.`nome` AS `nome_paciente`,
                                `e`.`especialidade`,
                                `a`.`cid`
                              FROM `agenda` `a`
                              INNER JOIN `profissional` `p` ON `a`.`id_profissional` = `p`.`id_profissional`
                              INNER JOIN `especialidade` `e` ON `a`.`id_especialidade` = `e`.`id_especialidade`
                              INNER JOIN `usuario` `u` ON `a`.`id_usuario` = `u`.`id_usuario`
                              WHERE `p`.`id_usuario` = " . $_SESSION['id_usuario'] . ";";

                      $resultSet = mysqli_query($conexao, $sql) or die("Query execution error! " . mysqli_error($conexao));

                      // Abre while para percorrer todos os registros da tabela. 
                      while($data = mysqli_fetch_assoc($resultSet)) {
                    ?>

                    <tr>
                      <td class="text-center"><?=$data["id_agenda"];?></td>
                      <td class="text-center"><?=$data["data"];?></td>
                      <td class="text-center"><?=$data["nome_profissional"];?></td>
                      <td class="text-center"><?=$data["especialidade"];?></td>
                      <td class="text-center"><?=$data["cid"];?></td>
                      <td class="text-center"><?=$data["nome_paciente"];?></td>
                    </tr>

                    <?php
                      // Fecha while. 
                      }
                    ?>
                </tbody>
            </table>
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