let AeronavesIMG=document.getElementById('AeroIMG');
let PecasIMG=document.getElementById('PecasIMG');
let Titulo=document.getElementById('Titulo');
let MenuDIV=document.getElementById('MenuDIV');

AeronavesIMG.addEventListener('mouseover',()=>{
    Titulo.textContent='Aeronaves';
    Titulo.style.animation='none';
    Titulo.style.animation='Aparecer 1s linear forwards';
});
PecasIMG.addEventListener('mouseover',()=>{
    Titulo.textContent='Equipamentos Aeronáuticos';
    Titulo.style.animation='Aparecer 1s linear forwards';
});
MenuDIV.addEventListener('mouseleave',()=>{
    Titulo.style.animation='Desaparecer 1s linear forwards';
});