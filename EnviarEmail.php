<?php

    

    if(isset($_POST['GerarBTN'])){

        

        $Nome=$_POST['NomeTXT'];
        $Email=$_POST['EmailTXT'];
        $NContato=$_POST['NContatoTXT'];
        $Titulo=$_POST['TituloTXT'];
        $Mensagem=$_POST['MensagemTXT'];
        
        
        

        $MensagemTXT="O Cliente, ".$Nome.", Enviou a Mensagem: \n\n "."'$Mensagem'\n\nAtenciosamente\n$Email\n$NContato";

        mail('atendimento@tornav.com.br',$Titulo,$MensagemTXT);

        echo json_encode('Enviado com Sucesso');

        
    }
?>