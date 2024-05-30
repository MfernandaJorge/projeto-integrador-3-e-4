function menu(param) {
  switch (param) {
    case 'calendario':
      location.href = "calendario.html";
      break;

    case 'agendamento':
      location.href = "agendamento.html";
      break;

    case 'cadastro':
      location.href = "cadastro.html";
      break;

    default:
      break;
  }
}