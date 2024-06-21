function login() {
  const username = document.getElementById('cpf-email').value;
  const password = document.getElementById('senha').value;

  // Cria um objeto FormData e adiciona os dados do formulário
  const formData = new FormData();
  formData.append('username', username);
  formData.append('password', password);

  // Envia os dados para o servidor usando Fetch
  fetch('../projeto-integrador/functions/login.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      location.href = "pages/home.php";
      return;

    // Redirecionar ou executar outras ações
    } else {
      alert('Falha no login: ' + data.message);
    }
  });
}