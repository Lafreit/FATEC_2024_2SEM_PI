<?php 
session_start();

$usuario = "portaria";
$senha = "FatecAraras";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["usuario"] == $usuario && $_POST ["senha"]== $senha){
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit;
    } else {
        $erro = "Usuário ou senha incorretos";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>">
        <label for="usuario">Usuário: </label>
        <input type="text" name="usuario" id="usuario" ><br><br>
        <label for="senha">Senha: </label>
        <input type="text" name="senha" id="senha" >
        <input type="submit" value="Logar">
    </form>
    <?php if(isset($erro)) echo "<p>$erro</p>"; ?>
    
</body>
</html>