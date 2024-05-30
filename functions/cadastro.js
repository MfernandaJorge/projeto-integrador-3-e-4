// function mask() {
//   $(document).ready(function(){
//     $('#tel').mask('(00) 0000-0000');
//   });
// }

function formatarNumero() {
  let input = document.getElementById('tel');
  let numeroFormatado = input.value.mask('(00)0000-0000');
  input.value = numeroFormatado;
}