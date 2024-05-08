<?php

include 'header.php';


$arquivoCarro = 'dadosCarros.txt';
if(!file_exists($arquivoCarro)){
    $handle = fopen($arquivoCarro, 'w') or die('Não foi possível criar o arquivo de dados para CArro');
    fclose($handle);
}

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (isset($_POST['nome'])&& isset($_POST['ra'])&& isset($_POST['placa'])) {
        $nome = $_POST['nome'];
        $ra = $_POST['ra'];
        $placa = $_POST['placa'];

        if(!empty($nome) && !empty($ra)&& !empty($placa)){
            $handle = fopen($arquivoCarro, 'a') or die('Não foi possível abrir o arquivo de dados dos Carros.');
            $data = "$nome, $ra, $placa \n\n";
            fwrite($handle, $data);
            fclose($handle);
            
            
        }
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Carros</title>
</head>
<body>
<h1>Cadastro de Carros</h1>
    <form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>">
     <label for="nome">Nome Completo: </label>
     <input type="text" id="nome" name="nome"><br><br>
     <label for="ra">RA: </label>
     <input type="text" id="ra" name="ra"><br><br>
     <label for="placa">Placa: </label>
     <input type="text" id="placa" name="placa"><br><br>
     <input type="submit" value="Cadastrar">
    </form>
    <p><a href="index.php">Voltar à página principal</a></p>  
</html>