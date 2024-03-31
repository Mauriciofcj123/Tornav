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
    Celula2.innerHTML='<input type="file" name="Arquivo[]" accept="image/png,image/jpeg">';
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
    Celula1.innerHTML='<input type="checkbox" name="EquiCB[]">';
    Linha.appendChild(Celula1);

    let Celula2=document.createElement('td');
    Celula2.innerHTML='<input type="text" name="DescricaoEQ[]">';
    Linha.appendChild(Celula2);

    let Celula3=document.createElement('td');
    Celula3.innerHTML='<input type="text" name="FabricanteEQ[]">';
    Linha.appendChild(Celula3);

    let Celula4=document.createElement('td');
    Celula4.innerHTML='<input type="text" name="ModeloEQ[]">';
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

let SalvarBTN=document.getElementById('SalvarBTN');
let Formulario=document.getElementById('Formulario');

SalvarBTN.addEventListener('click',(e)=>{

    if(VerificarCampos()==false){
        Swal.fire('Erro','Campos obrigatórios vazios.','error');
    }else{
        if(VerificarImagens()==false){
            Swal.fire({
                title:'Aviso',
                text: 'Tem certeza que deseja continuar sem adicionar imagens?',
                icon:'info',
                confirmButtonText:'Sim, Tenho Certeza',
                cancelButtonText:'Voltar',
                showCancelButton:true
            }).then((retorno)=>{
                if(retorno['isConfirmed']===true){
                    SalvarBTN.type='submit';
                    SalvarBTN.click;
                }
            });
        }else{
            SalvarBTN.type='submit';
            SalvarBTN.click;
        }
    }
});

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
    let Arquivo=document.getElementsByName('Arquivo[]');
    let TodasOcupadas=true;

    if(Linhas.length>0){
        for(L=0;L<Linhas.length;L++){
            if(Arquivo[L].value==''){
                TodasOcupadas=false;
            }
        }
    }else{
        TodasOcupadas=false;
    }

    return TodasOcupadas;    
}

let Pesquisar=document.getElementById('PesquisarBTN');

Pesquisar.addEventListener('click',(e)=>{
    e.preventDefault();

    BuscarPrefixo();
});

let GerarBTN=document.getElementById('GerarBTN');
GerarBTN.addEventListener('click',(e)=>{
    e.preventDefault();

    BuscarTexto();
});

function BuscarPrefixo(){
    let Prefixo=document.getElementById('Prefixo');
    let Valor=Prefixo.value.replaceAll('-','');
    let Fabricante=document.getElementById('Fabricante');
    let Modelo=document.getElementById('Modelo');
    let AnoFab=document.getElementById('AnoFab');

    $.ajax({
        url: 'Pesquisar.php',
        method:'post',
        dataType:'json',
        data:{
            Placa: Valor
        }
    }).done((retorno)=>{
        if(retorno=='Nenhuma Aeronave Encontrada'){
            Swal.fire('Aviso',retorno,'info');
        }else{
            Fabricante.value=retorno['NM_FABRICANTE'];
            AnoFab.value=retorno['NR_ANO_FABRICACAO'];
            Modelo.value=retorno['DS_MODELO'];
        }

        console.log(retorno);
    });
}
function BuscarTexto(){
    let Carac=document.getElementById('Carac');

    $.ajax({
        url: 'Pesquisar.php',
        method:'post',
        dataType:'json',
        data:{
            GerarBTN: 'Gerar'
        }
    }).done((retorno)=>{
        if(retorno=='Nenhum Texto Gerado'){
            Swal.fire('Aviso',retorno,'error');
        }else{
            Carac.value=retorno['Texto'];
        }

        console.log(retorno);
    });
}
