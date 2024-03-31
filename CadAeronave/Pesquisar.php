<?php
    require_once('../Conexao.php');

    if(isset($_POST['Placa'])){
        $Placa=mysqli_real_escape_string($mysqli,$_POST['Placa']);

        $SQL="SELECT * FROM aeronaves WHERE MARCA='$Placa' LIMIT 1";
        $Requisicao=mysqli_query($mysqli,$SQL);
        $QTD=$Requisicao->num_rows;
    
        if($QTD>0){
            $Aeronave=$Requisicao->fetch_assoc();
            echo json_encode($Aeronave);
        }else{
            echo json_encode('Nenhuma Aeronave Encontrada');
        }
    }

    if(isset($_POST['GerarBTN'])){

        $SQL="SELECT * FROM textos_aeronaves ORDER BY RAND() LIMIT 1";
        $Requisicao=mysqli_query($mysqli,$SQL);
        $QTD=$Requisicao->num_rows;
    
        if($QTD>0){
            $Texto=$Requisicao->fetch_assoc();
            echo json_encode($Texto);
        }else{
            echo json_encode('Nenhum Texto Gerado');
        }
    }
?>