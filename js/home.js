function menu(param) {
  switch (param) {
    case 'agendamento':
      location.href = "../pages/agendamento.php";
      break;

    case 'perfil':
      location.href = "../pages/perfil-edit.php";
      break;

    case 'agenda':
      location.href = "../pages/agenda.php";
      break;
    default:
      break;
  }
}