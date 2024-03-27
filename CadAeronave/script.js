

function Caminho(){
    let Arquivo=document.getElementById('Arquivo');
    console.log(Arquivo.name);
}

function AdicionarImg(){
    let Tabela=document.getElementById('TabelaImgs');

    let Linha=document.createElement('tr');
    Linha.setAttribute('name','Linha');
    Tabela.appendChild(Linha);

    let Celula1=document.createElement('td');
    Celula1.innerHTML='<input type="checkbox" name="IMGCB">';
    Linha.appendChild(Celula1);

    let Celula2=document.createElement('td');
    Celula2.innerHTML='<input type="file" name="Arquivo" accept="image/png,image/jpeg">';
    Linha.appendChild(Celula2);
}
function RemoverImg(){
    let Linhas=document.getElementsByName('Linha');
    let IMGCB=document.getElementsByName('IMGCB');
    

    for(c=0;c<=Linhas.length+1;c++){
        
        while(IMGCB[c].checked){
            Linhas[c].remove();
        }
    }
}

function AdicionarEquipamento(){
    let Tabela=document.getElementById('TabelaProd');

    let Linha=document.createElement('tr');
    Linha.setAttribute('name','LinhaEq');
    Tabela.appendChild(Linha);

    let Celula1=document.createElement('td');
    Celula1.innerHTML='<input type="checkbox" name="EquiCB">';
    Linha.appendChild(Celula1);

    let Celula2=document.createElement('td');
    Celula2.innerHTML='<input type="text" name="Descricao">';
    Linha.appendChild(Celula2);

    let Celula3=document.createElement('td');
    Celula3.innerHTML='<input type="text" name="Fabricante">';
    Linha.appendChild(Celula3);

    let Celula4=document.createElement('td');
    Celula4.innerHTML='<input type="text" name="Modelo">';
    Linha.appendChild(Celula4);
}

function RemoverEquipamento(){
    let Linhas=document.getElementsByName('LinhaEq');
    let EquiCB=document.getElementsByName('EquiCB');
    

    for(c=0;c<=Linhas.length+1;c++){
        

        while(EquiCB[c].checked){
            Linhas[c].remove();
        }
        console.log(c+"/"+Linhas.length);
    }
}

document.addEventListener('keyup',()=>{
    console.log(VerificarCampos());
});

function VerificarCampos(){
    let Fabricante=document.getElementById('Fabricante');
    let Modelo=document.getElementById('Modelo');
    let Caractetisticas=document.getElementById('Carac');
    let HorasAtuais=document.getElementById('HorasAtuais');
    let HorasDisp=document.getElementById('HorasDisp');
    let Aprovado=true;

    if(Fabricante.value.length<=0){
        Aprovado=false;
    }
    if(Modelo.value.length<=0){
        Aprovado=false;
    }
    if(Caractetisticas.value.length<=0){
        Aprovado=false;
    }
    if(HorasAtuais.value.length<=0){
        Aprovado=false;
    }
    if(HorasDisp.value.length<=0){
        Aprovado=false;
    }

    return Aprovado;
}
function VerificarImagens(){
    let Linhas=document.getElementsByName('Linha');
    
}