function onSubmit() {
  const data = document.getElementById('data').value;
  const especialidade = document.getElementById('especialidade').value;
  const profissional = document.getElementById('profissional').value;
  const cid = document.getElementById('cid').value;

  // Cria um objeto FormData e adiciona os dados do formulário
  const formData = new FormData();
  formData.append('data', data);
  formData.append('especialidade', especialidade);
  formData.append('profissional', profissional);
  formData.append('cid', cid);

  // Envia os dados para o servidor usando Fetch
  fetch('../functions/agendamento.php?function=onSubmit', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert('Agendado com sucesso!');
      location.href = "../pages/home.php";
      return;

    // Redirecionar ou executar outras ações
    } else {
      alert('Falha no agendamento: ' + data.message);
    }
  });
}

function comboEspecialidade() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../functions/agendamento.php?function=comboEspecialidade", true)
  xhr.onload = function() {
    if (this.status == 200) {
      try {
        var especialidades = JSON.parse(this.responseText); // Converter a resposta JSON para um objeto
        var select = document.getElementById('especialidade');

        // Verificar se o elemento <select> existe
        if (!select) {
          console.error('Elemento <select> com id "especialidade" não encontrado.');
          return;
        }

        select.innerHTML = '<option value="" disabled selected>Selecione uma especialidade</option>';

        JSON.parse(especialidades).forEach(function(especialidade) { // Iterar sobre o array de especialidades
          var option = document.createElement('option');
            option.value = especialidade.id_especialidade;
            option.text = especialidade.especialidade;
            select.appendChild(option);
        });

      } catch (e) {
        console.error('Erro ao analisar JSON:', e);
      }
    }
  };
  xhr.send();
}

function comboProfissional() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../functions/agendamento.php?function=comboProfissional", true)
  xhr.onload = function() {
    if (this.status == 200) {
      try {
        var profissionais = JSON.parse(this.responseText); // Converter a resposta JSON para um objeto
        var select = document.getElementById('profissional');

        // Verificar se o elemento <select> existe
        if (!select) {
          console.error('Elemento <select> com id "profissional" não encontrado.');
          return;
        }

        select.innerHTML = '<option value="" disabled selected>Selecione uma profissional</option>';

        JSON.parse(profissionais).forEach(function(profissional) { // Iterar sobre o array de profissionais

          var option = document.createElement('option');
            option.value = profissional.id_profissional;
            option.text = profissional.nome;
            select.appendChild(option);
        });

      } catch (e) {
        console.error('Erro ao analisar JSON:', e);
      }
    }
  };
  xhr.send();
}