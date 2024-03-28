<?php
    require_once('../Conexao.php');

    function SalvarImagem($Imagens){
        require('../Conexao.php');

        for($I=0;$I<count($Imagens);$I++){
            $ArquivoDivido=explode('.',$Imagens['name'][$I]);
            $Formato=strtolower($ArquivoDivido[sizeof($ArquivoDivido)-1]);
    
            if($Formato=='jpeg' || $Formato=='png'){
                $Permitido=false;
    
                while($Permitido==false){
                    $Nome='Aero'.uniqid().'.'.$Formato;
                    $Caminho='../srcimgs/'.$Nome;
                   
    
                    move_uploaded_file($Imagens['tmp_name'][$I],$Caminho);
    
                    $SQLSel="SELECT * FROM imgs_aeronaves WHERE Nome='$Nome'";
                    $ReqSel=mysqli_query($mysqli,$SQLSel);
                    $QTDSel=$ReqSel->num_rows;
    
                    if($QTDSel==0){
                        $SQLInsert="INSERT INTO imgs_aeronaves (`Nome`,`Caminho`,`IDAeronave`) VALUES ('$Nome','$Caminho','$IDAero')";
                        $ReqInsert=mysqli_query($mysqli,$SQLInsert);
                        echo 'Salvo com sucesso. ID= '.$I.'<br>';
                        $Permitido=true;
                    }else{
                        $Permitido=false;
                    }
                }
                
            }else{
                echo 'Selecione um formato de arquivo suportado(.jpeg, .png)';
            }
            
        }
    }

    if(isset($_POST['SalvarBTN'])){
        $Fabricante=mysqli_real_escape_string($mysqli,$_POST['Fabricante']);
        $Modelo=mysqli_real_escape_string($mysqli,$_POST['Modelo']);
        $Caracter=mysqli_real_escape_string($mysqli,$_POST['Caracter']);
        $AnoFab=mysqli_real_escape_string($mysqli,$_POST['AnoFab']);
        $HorasAtuais=mysqli_real_escape_string($mysqli,$_POST['HorasAtuais']);
        $HorasDisp=mysqli_real_escape_string($mysqli,$_POST['HorasDisp']);
        $Imagem=$_FILES['Arquivo'];

        $SQLAeronave="INSERT INTO produtos_aeronaves (`Fabricante`,`Modelo`,`AnoFabricacao`,`HorasAtuais`,`HorasDisp`,`Caracteristicas`) VALUES ('$Fabricante','$Modelo','$AnoFab','$HorasAtuais','$HorasDisp','$Caracter')";
        $AeronaveReq=mysqli_query($mysqli,$SQLAeronave);

        $SQLIDAero="SELECT * FROM produtos_aeronaves ORDER BY IDAeronave DESC LIMIT 1";
        $IDAeroReq=mysqli_query($mysqli,$SQLIDAero);
        $IDAero=$IDAeroReq->fetch_assoc()['IDAeronave'];

        echo $IDAero;

        if(count($Imagem)>0){
            SalvarImagem($Imagem);
        }
        if(isset($_POST['DescricaoEQ'])){
            $DescricaoEQ=$_POST['DescricaoEQ'];
            $FabricanteEQ=$_POST['FabricanteEQ'];
            $ModeloEQ=$_POST['ModeloEQ'];

            $DescricaoEQ=$_POST['DescricaoEQ'];
            echo $DescricaoEQ[0];

            echo count($DescricaoEQ).'------';

            if(count($DescricaoEQ)>0){
                for($E=0;$E<count($DescricaoEQ);$E++){

                    $SQLEQ="INSERT INTO adicionais_aeronaves (`Fabricante`,`Modelo`,`Descricao`,`IDAeronave`) VALUES ('".$FabricanteEQ[$E]."','".$ModeloEQ[$E]."','".$DescricaoEQ[$E]."')";
                    $EQReq=mysqli_query($mysqli,$SQLEQ);
                }
            }
        }
        }
        


    
    ?>