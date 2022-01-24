const minusButton = document.getElementById('minus');
const plusButton = document.getElementById('plus');
const inputField = document.getElementById('input');

minusButton.addEventListener('click', event => {
  event.preventDefault();
  const currentValue = Number(inputField.value) || 0;
  inputField.value = currentValue - 1;
  if (inputField.value < 1) {
    inputField.value = 0;
  }
});

plusButton.addEventListener('click', event => {
  event.preventDefault();
  const currentValue = Number(inputField.value) || 0;
  inputField.value = currentValue + 1;
  if(inputField.value > 1){
    alert("Maaf Barang Terbatas");
    inputField.value = 1; 
  }
});

const open = document.getElementById('open');
const popup_container = document.getElementById('popup_container');
const close = document.getElementById('close');

open.addEventListener('click', () => 
{
  popup_container.classList.add('show');
});

close.addEventListener('click', () => 
{
  popup_container.classList.remove('show');
});

