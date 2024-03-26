<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arapey:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../cabecalho/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require('../cabecalho/index.php');
    ?>
    <div class='Video'>
        <video autoplay muted loop>
            <source src='../video/Video.mp4'>
    </video>
    </div>
    <div class='diferenciais'>
        <h1>Nossos Diferenciais</h1>
        <div class='LinhaDif' style='background-color: rgb(179, 227, 255)'>
            <div class='DivDif1' style='background-color: rgb(100, 198, 255);'>
                <img src="imgs/Praticidade.png"><br>
                <h2>Praticidade</h2>
            </div>
            <div class='DivDif2'>
                <textarea>A versatilidade e a qualidade dos nossos rebocadores de aeronaves são perfeitos para qualquer aplicação de reboque em aeronaves até 9 toneladas.</textarea>
            </div>
        </div>
        <div class='LinhaDif' style='background-color: white'>
            <div class='DivDif1' style='background-color: rgb(230, 253, 255)'>
                <img src="imgs/Seguranca.png">
                <h2>Segurança</h2>
            </div>
            <div class='DivDif2'>
                <textarea>Nossos rebocadores têm sistemas de aceleração e frenagem suaves que facilita seu manuseio.</textarea>
            </div>
        </div>
        <div class='LinhaDif' style='background-color: rgb(179, 227, 255)'>
            <div class='DivDif1' style='background-color: rgb(100, 198, 255);'>
                <img src="imgs/Versatilidade.png">
                <h2>Versatilidade</h2>
            </div>
            <div class='DivDif2'>
                <textarea>Nossos rebocadores são construídos com estrutura de aço carbono e pode ser facilmente operado por uma só pessoa.</textarea>
            </div>
        </div>
    </div>
</body>
</html>