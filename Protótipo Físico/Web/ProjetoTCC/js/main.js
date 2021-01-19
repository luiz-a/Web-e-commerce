function Cadastro_prod00(){
    const mercado = document.getElementById('btn_mec')
    const cliente = document.getElementById('btn_cli')
    const form_cli = document.getElementById('form_user')
    const form_prod = document.getElementById('form_prod')

    mercado.style.backgroundColor = 'transparent'
    mercado.style.border = '1px solid#fff'
    mercado.style.color = '#fff'
    cliente.style.backgroundColor = '#F4D03F'
    cliente.style.border = 'none'
    cliente.style.color = '#000'

    form_cli.style.transform = 'translate(0)';
    form_prod.style.transform = 'translate(200%)';
}

function Cadastro_prod01(){
    const mercado = document.getElementById('btn_mec')
    const cliente = document.getElementById('btn_cli')
    const form_cli = document.getElementById('form_user')
    const form_prod = document.getElementById('form_prod')

    cliente.style.backgroundColor = 'transparent'
    cliente.style.border = '1px solid#fff'
    cliente.style.color = '#fff'
    mercado.style.backgroundColor = '#F4D03F'
    mercado.style.border = 'none'
    mercado.style.color = '#000'


    form_cli.style.transform = 'translate(200%)';
    form_prod.style.transform = 'translate(0)';
}

const msg = document.getElementById("msg");
const file = document.getElementById("fileUploaded");

file.onchange = function() {
    msg.innerHTML = "Arquivo enviado.";
}