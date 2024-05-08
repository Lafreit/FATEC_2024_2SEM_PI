<?php

include 'header.php';

$arquivoCarros = 'dadosCarros.txt';
if (!file_exists($arquivoCarros)){
    echo "Nenhum dado de carro cadastrado ainda.";
}else{
    echo "<h2>Dados dos Carros:</h2>";
    $dados = file_get_contents($arquivoCarros);
    echo nl2br($dados);
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Carros</title>
</head>
<body>
    <p><a href="index.php">Voltar à página principal</a></p>
</body>
</html>