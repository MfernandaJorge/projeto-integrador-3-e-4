function onSubmit() {
  const nome = document.getElementById('nome').value;
  const cpf = document.getElementById('cpf').value;
  const data = document.getElementById('data').value;
  const email = document.getElementById('email').value;
  const senha = document.getElementById('senha').value;
  const tel = document.getElementById('tel').value;
  const cpf_r = document.getElementById('cpf_r').value;
  const tel_r = document.getElementById('tel_r').value;
  const tipo_user = document.getElementById('tipo_user').value;
  const crm = document.getElementById('crm').value;

  // Cria um objeto FormData e adiciona os dados do formulário
  const formData = new FormData();
  formData.append('nome', nome);
  formData.append('cpf', cpf);
  formData.append('data', data);
  formData.append('email', email);
  formData.append('senha', senha);
  formData.append('tel', tel);
  formData.append('cpf_r', cpf_r);
  formData.append('tel_r', tel_r);
  formData.append('tipo_user', tipo_user);
  formData.append('crm', crm);

  // Envia os dados para o servidor usando Fetch
  fetch('../functions/perfil.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert('Cadastro salvo com sucesso!');
      location.href = "../index.php";
      return;

    // Redirecionar ou executar outras ações
    } else {
      alert('Falha no cadastro: ' + data.message);
      return;
    }
  });
}