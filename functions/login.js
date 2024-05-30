function login() {
    var login = document.getElementById('cpf-email').value,
        password = document.getElementById('senha').value;

    if (login == 'admin' && password == "admin-123") {
      alert('Sucesso!');
      location.href = "home.html";

    } else {
      alert('Usuário ou senha incorretos!');
    }
  }