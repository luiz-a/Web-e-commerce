var count1 = 0;
var count2 = 0;
var count3 = 0;
var count4 = 0;
var count5 = 0;
var count6 = 0;
var count7 = 0;
var count8 = 0;

function Adicionar1(){
    const vlr1 = document.getElementById('cont1');
    count1++;
    vlr1.innerHTML = `${count1}`;
}
    
function Adicionar2(){
    const vlr2 = document.getElementById('cont2');
    count2++;
    vlr2.innerHTML = `${count2}`;
}

function Adicionar3(){
    const vlr3 = document.getElementById('cont3');
    count3++;
    vlr3.innerHTML = `${count3}`;
}
function Adicionar4(){
    const vlr4 = document.getElementById('cont4');
    count4++;
    vlr4.innerHTML = `${count4}`;
}
function Adicionar5(){
    const vlr5 = document.getElementById('cont5');
    count5++;
    vlr5.innerHTML = `${count5}`;
}
function Adicionar6(){
    const vlr6 = document.getElementById('cont6');
    count6++;
    vlr6.innerHTML = `${count6}`;
}
function Adicionar7(){
    const vlr7 = document.getElementById('cont7');
    count7++;
    vlr7.innerHTML = `${count7}`;
}
function Adicionar8(){
    const vlr8 = document.getElementById('cont8');
    count8++;
    vlr8.innerHTML = `${count8}`;
}


function Subtrair1(){
    const vlr1 = document.getElementById('cont1');
    if(count1 > 0){
    count1--;
    }
    vlr1.innerHTML = `${count1}`;
}   
function Subtrair2(){
    const vlr2 = document.getElementById('cont2');
    if(count2 > 0){
    count2--;
    }
    vlr2.innerHTML = `${count2}`;
}
function Subtrair3(){
    const vlr3 = document.getElementById('cont3');
    if(count3 > 0){
    count3--;
    }
    vlr3.innerHTML = `${count3}`;
}
function Subtrair4(){
    const vlr4 = document.getElementById('cont4');
    if(count4 > 0){
    count4--;
    }
    vlr4.innerHTML = `${count4}`;
}
function Subtrair5(){
    const vlr5 = document.getElementById('cont5');
    if(count5 > 0){
    count5--;
    }
    vlr5.innerHTML = `${count5}`;
}
function Subtrair6(){
    const vlr6 = document.getElementById('cont6');
    if(count6 > 0){
    count6--;
    }
    vlr6.innerHTML = `${count6}`;
}
function Subtrair7(){
    const vlr7 = document.getElementById('cont7');
    if(count7 > 0){
    count7--;
    }
    vlr7.innerHTML = `${count7}`;
}
function Subtrair8(){
    const vlr8 = document.getElementById('cont8');
    if(count8 > 0){
    count8--;
    }
    vlr8.innerHTML = `${count8}`;
}


function tds(){
    const todos = document.getElementById('tds');
    const carne = document.getElementById('carnes');
    const frios = document.getElementById('frios');
    const bebidas = document.getElementById('bebidas');
    const horti = document.getElementById('horti');

    todos.style.borderBottom = '2px solid #F4D03F'
    todos.style.color = '#000'

    carne.style.borderBottom = '1px solid #C4C4C4';
    carne.style.color = '#C4C4C4';

    frios.style.borderBottom = '1px solid #C4C4C4';
    frios.style.color = '#C4C4C4';

    bebidas.style.borderBottom = '1px solid #C4C4C4';
    bebidas.style.color = '#C4C4C4';

    horti.style.borderBottom = '1px solid #C4C4C4';
    horti.style.color = '#C4C4C4';
}
function carnes(){
    const carne = document.getElementById('carnes');
    const todos = document.getElementById('tds');
    const frios = document.getElementById('frios');
    const bebidas = document.getElementById('bebidas');
    const horti = document.getElementById('horti');

    carne.style.borderBottom = '2px solid #F4D03F'
    carne.style.color = '#000'

    todos.style.borderBottom = '1px solid #C4C4C4';
    todos.style.color = '#C4C4C4';

    frios.style.borderBottom = '1px solid #C4C4C4';
    frios.style.color = '#C4C4C4';

    bebidas.style.borderBottom = '1px solid #C4C4C4';
    bebidas.style.color = '#C4C4C4';

    horti.style.borderBottom = '1px solid #C4C4C4';
    horti.style.color = '#C4C4C4';
}
function frios(){
    const carne = document.getElementById('carnes');
    const todos = document.getElementById('tds');
    const frios = document.getElementById('frios');
    const bebidas = document.getElementById('bebidas');
    const horti = document.getElementById('horti');

    carne.style.borderBottom = '1px solid #C4C4C4'
    carne.style.color = '#C4C4C4'

    todos.style.borderBottom = '1px solid #C4C4C4';
    todos.style.color = '#C4C4C4';

    frios.style.borderBottom = '2px solid #F4D03F';
    frios.style.color = '#000';

    bebidas.style.borderBottom = '1px solid #C4C4C4';
    bebidas.style.color = '#C4C4C4';

    horti.style.borderBottom = '1px solid #C4C4C4';
    horti.style.color = '#C4C4C4';
}
function bebidas(){
    const carne = document.getElementById('carnes');
    const todos = document.getElementById('tds');
    const frios = document.getElementById('frios');
    const bebidas = document.getElementById('bebidas');
    const horti = document.getElementById('horti');

    carne.style.borderBottom = '1px solid #C4C4C4'
    carne.style.color = '#C4C4C4'

    todos.style.borderBottom = '1px solid #C4C4C4';
    todos.style.color = '#C4C4C4';

    frios.style.borderBottom = '1px solid #C4C4C4';
    frios.style.color = '#C4C4C4';

    bebidas.style.borderBottom = '2px solid #F4D03F';
    bebidas.style.color = '#000';

    horti.style.borderBottom = '1px solid #C4C4C4';
    horti.style.color = '#C4C4C4';
}
function horti(){
    const carne = document.getElementById('carnes');
    const todos = document.getElementById('tds');
    const frios = document.getElementById('frios');
    const bebidas = document.getElementById('bebidas');
    const horti = document.getElementById('horti');

    carne.style.borderBottom = '1px solid #C4C4C4'
    carne.style.color = '#C4C4C4'

    todos.style.borderBottom = '1px solid #C4C4C4';
    todos.style.color = '#C4C4C4';

    frios.style.borderBottom = '1px solid #C4C4C4';
    frios.style.color = '#C4C4C4';

    bebidas.style.borderBottom = '1px solid #C4C4C4';
    bebidas.style.color = '#C4C4C4';

    horti.style.borderBottom = '2px solid #F4D03F';
    horti.style.color = '#000';
}

