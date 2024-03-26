<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <script src="script2.js"></script>
    <title>Cadastro de Aeronaves</title>
</head>
<body>
    <form action="" method="post" enctype='multipart/form-data'>
        <label>Cadastrar Imagem</label>
        <input type="file" name="Arquivo" id="Arquivo">
        <input  type="button" value="Salvar" onclick='Caminho()'>
    </form>
    <?php
    if(isset($_FILES['Arquivo'])){
        $Arquivo=$_FILES['Arquivo'];
        echo print_r($Arquivo['tmp_name']);
    }
    ?>
</body>
</html>