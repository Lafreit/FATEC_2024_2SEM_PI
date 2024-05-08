<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>
</head>
<body>
    <form action="" method="post">
        Email:
    <input type="text" name="email">
        Senha:
    <input type="password" name="senha"><br>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>

<script>



if (isset($_POST['submit'])) {
    senha = $_POST['senha']
    email = $_POST['email']

    $pdo = new mysql("mysql.host=localhost,dbname=clientes, 'root', ''")
 
    $sql = $pdo->prepare("INSERT ")
}
</script>