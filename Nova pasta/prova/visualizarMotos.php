<?php

include 'header.php';

$arquivoMotos = 'dadosMotos.txt';
if (!file_exists($arquivoMotos)){
    echo "Nenhum dado de moto cadastrado ainda.";
}else{
    echo "<h2>Dados dos Motos:</h2>";
    $dados = file_get_contents($arquivoMotos);
    echo nl2br($dados);
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Motos</title>
</head>
<body>
    <p><a href="index.php">Voltar à página principal</a></p>
</body>
</html>