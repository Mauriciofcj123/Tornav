let Arquivo=document.getElementById('Arquivo');

Arquivo.addEventListener('change',()=>{
    let Leitor=new FileReader(Arquivo);
    console.log('123');

    Leitor.addEventListener('load',()=>{
        console.log(Leitor.result);
    });
});

function Caminho(){
    let Arquivo=document.getElementById('Arquivo');
    console.log(Arquivo.name);
}