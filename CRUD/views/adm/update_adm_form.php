<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Atualizar Administrador</title> 
</head>
<body>

    <h1>Atualizar Administrador</h1>

    <form action="/dev_pub/update-adm" method="POST">
 
        <input type="hidden" name="id" value="<?php echo $admInfo['id']; ?>">

        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" value="<?php echo $admInfo['nome_completo']; ?>" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" value="<?php echo $admInfo['senha']; ?>" required><br><br>

        <input type="submit" value="Atualizar Administrador">
    </form>

    <a href="/dev_pub/list-adm">Voltar para a lista</a>


</body>
</html>
