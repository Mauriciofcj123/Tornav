<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="../cabecalho/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Cadastro de Aeronaves</title>
</head>
<body>
    <?php
        require('../cabecalho/index.php');
    ?>
    <form action="salvar.php" method="post" enctype="multipart/form-data" class='Formulario' id='Formulario'>
        <label class='Titulo'>Prefixo</label><br>
        <input class='Campo' id='Prefixo' type="text" name="Prefixo" id=""><br>
        <input type="submit" value="Pesquisar" class="Botoes" id='PesquisarBTN'><br><br><br>
        <label class='Titulo'>Fabricante</label><br>
        <input class='Campo' id='Fabricante' type="text" name="Fabricante" id=""><br>
        <label class='Titulo'>Modelo</label><br>
        <input class='Campo' id='Modelo' type="text" name="Modelo" id=""><br>
        <label class='Titulo'>Caracteristicas</label><br>
        <textarea name="Caracter" id="Carac" cols="30" rows="10" class='Campo Longo'></textarea><br>
        <input type="submit" value="Gerar Texto" id='GerarBTN'><br><br>
        <label class='Titulo'>Ano da Fabricação</label><br>
        <select name="AnoFab" id="AnoFab" class='Campo'>
            <?php
                $Data=date('d/m/Y');
                $Ano=explode('/',$Data);

                for($a=$Ano[2]-60;$a<=$Ano[2];$a++){
                    echo "<option>".$a."</option>";
                }
                
            ?>
        </select><br>
        <label class='Titulo'>Horas Atuais</label><br>
        <input class='Campo' id='HorasAtuais' type="number" step='0.01' name="HorasAtuais" id=""><br>
        <label class='Titulo'>Horas Disponíveis de Motor</label><br>
        <input class='Campo' id='HorasDisp' type="number" step='0.01' name="HorasDisp" id=""><br><br><br>
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
            </table>
        </div>
        <input  type="button" value="Salvar" id='SalvarBTN' name='SalvarBTN' class="Botoes">
    </form>
    
</body>
</html>