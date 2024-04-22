
$('#NContato').mask('(00) 00000-0000');

function ColorirTabela(){

    let Linhas=document.getElementsByName('Linha');

    for(i=0;i<Linhas.length;i++){
        if(i%2==0){
            Linhas[i].style.backgroundColor='rgb(236, 248, 255)';
        }else{
            Linhas[i].style.backgroundColor='rgb(215, 240, 255)';
        }
    }

}
ColorirTabela();


var Ancora=document.getElementById('Produtos');
document.addEventListener('scroll',()=>{
    let Posicao=Ancora.getBoundingClientRect();
    let PosicaoTopo=window.scrollY;
});

function EnviarEmail(){
    let Nome=document.getElementById('Nome');
    let Email=document.getElementById('Email');
    let NContato=document.getElementById('NContato');
    let Titulo=document.getElementById('Titulo');
    let Mensagem=document.getElementById('Mensagem');

    $.ajax({
        url:'EnviarEmail.php',
        method:'post',
        dataType:'json',
        data:{
            GerarBTN:'Gerar',
            NomeTXT: Nome.value,
            EmailTXT: Email.value,
            NContatoTXT: NContato.value,
            TituloTXT: Titulo.value,
            MensagemTXT: Mensagem.value
        }
    }).done((resultado)=>{
        Erro.textContent=resultado;
    });
}
function VerificarCampos(){
    let Valido=true;
    
    let Nome=document.getElementById('Nome');
    let Email=document.getElementById('Email');
    let NContato=document.getElementById('NContato');
    let Titulo=document.getElementById('Titulo');
    let Mensagem=document.getElementById('Mensagem');

    if(Nome.value.length<10){
        Valido=false;
    }

    let EmailPedaco=Email.value.split('@');

    if(EmailPedaco.length==1){
        Valido=false;
    }

    if(NContato.value.length!=15){
        Valido=false;
    }
    
    if(Mensagem.value.length<=0){
        Valido=false;
    }

    return Valido;

}

let EnviarBTN=document.getElementById('EnviarBTN');

EnviarBTN.addEventListener('click',(e)=>{
    e.preventDefault();

    if(VerificarCampos()){
        EnviarEmail();
    }else{
        Swal.fire('Aviso','Por favor preencha todos os campos corretamente.','error');
    }

    

    

    
});



