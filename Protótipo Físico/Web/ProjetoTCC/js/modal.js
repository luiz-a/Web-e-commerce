//Pegar o elemento Modal
const modal = document.getElementById('option');
//Pegar o Botão Modal
const modal_btn = document.getElementById('user');
//Pegar Botão Close
const close_btn = document.getElementsByClassName('close')[0];

//Ouvir o open
    modal_btn.addEventListener('click', openModal);
    
// Ovir click no window
    close_btn.addEventListener('click', closeModal);

//Function Abrir Modal
    function openModal(){
     modal.style.transform = 'translate(0px)';
 }

    function closeModal(){
        modal.style.transform = 'translate(-300px)';
    }