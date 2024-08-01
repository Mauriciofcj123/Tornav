var MenuVisible=false;
let Menu=document.getElementById('Menu');
Menu.style.opacity='0%;';
Menu.style.height='0px';
function Hamburger(){
    MenuVisible=!MenuVisible;

    if(MenuVisible){
        Menu.style.height='150px';
        Menu.style.opacity='100%;';
    }else{
        
        Menu.style.opacity='0%;';
        Menu.style.height='0px';
        
    }
}