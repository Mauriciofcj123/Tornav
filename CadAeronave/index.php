<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="../cabecalho/style.css">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Aeronaves</title>
</head>
<body>
    <?php
        require('../cabecalho/index.php');
    ?>
    <form action="" method="post" enctype='multipart/form-data' class='Formulario'>
        <label class='Titulo'>Fabricante</label><br>
        <input class='Campo' id='Fabricante' type="text" name="Fabricante" id=""><br>
        <label class='Titulo'>Modelo</label><br>
        <input class='Campo' id='Modelo' type="text" name="Modelo" id=""><br>
        <label class='Titulo'>Caracteristicas</label><br>
        <input type="text" id='Carac' class='Campo' name="Caracter"><br>
        <label class='Titulo'>Ano da Fabricação</label><br>
        <select name="AnoFab" id="AnoFab" class='Campo'>
            <?php
                $Data=date('d/m/Y');
                $Ano=explode('/',$Data);

                for($a=$Ano[2]-40;$a<$Ano[2]+2;$a++){
                    echo "<option>".$a."</option>";
                }
                
            ?>
        </select><br>
        <label class='Titulo'>Horas Atuais</label><br>
        <input class='Campo' id='HorasAtuais' type="number" name="HorasAtuais" id=""><br>
        <label class='Titulo'>Horas Disponíveis de Motor</label><br>
        <input class='Campo' id='HorasDisp' type="number" name="HorasDisp" id=""><br><br><br>
        <label class='Titulo'>Imagens</label><br>
        <div class='DivTabela'>
            <button type='button' class='AdicionarBTN' onclick='AdicionarImg()'>+</button>
            <button type='button' class='RemoverBTN' onclick='RemoverImg()'>-</button><br>
            <table id='TabelaImgs'>
                <thead>
                    <th></th>
                    <th>Imagem</th>
                </thead>
            </table><br>
        </div>
        <label class='Titulo'>Equipamentos Adicionais</label><br>
        <div class='DivTabela'>
            <table id='TabelaProd'>
                <button type='button' class='AdicionarBTN' onclick='AdicionarEquipamento()'>+</button>
                <button type='button' class='RemoverBTN' onclick='RemoverEquipamento()'>-</button><br><br>
                <thead>
                    <th></th>
                    <th>Descrição</th>
                    <th>Fabricante</th>
                    <th>Modelo</th>
                </thead>
                <tr name='LinhaEq'>
                    <td><input type="checkbox"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
            </table>
        </div>
        <input  type="submit" value="Salvar" id='SalvarBTN'>
    </form>
    <?php
    require_once('../Conexao.php');

    if(isset($_FILES['Arquivo'])){
        $Arquivo=$_FILES['Arquivo'];
        $ArquivoDivido=explode('.',$Arquivo['name']);
        $Formato=strtolower($ArquivoDivido[sizeof($ArquivoDivido)-1]);

        if($Formato=='jpeg' || $Formato=='png'){
            $Permitido=false;

            while($Permitido==false){
                $Nome='Aero'.uniqid().'.'.$Formato;
                $Caminho='../srcimgs/'.$Nome;
               

                move_uploaded_file($Arquivo['tmp_name'],$Caminho);

                $SQLSel="SELECT * FROM produtos_imgs WHERE Nome='$Nome'";
                $ReqSel=mysqli_query($mysqli,$SQLSel);
                $QTDSel=$ReqSel->num_rows;

                if($QTDSel==0){
                    $SQLInsert="INSERT INTO produtos_imgs (`Nome`,`Caminho`) VALUES ('$Nome','$Caminho')";
                    $ReqInsert=mysqli_query($mysqli,$SQLInsert);
                    echo 'Salvo com sucesso.';
                    $Permitido=true;
                }else{
                    $Permitido=false;
                }
            }
            
        }else{
            echo 'Selecione um formato de arquivo suportado(.jpeg, .png)';
        }
        
        //echo print_r($Arquivo['name']);
    }
    ?>
</body>
</html>