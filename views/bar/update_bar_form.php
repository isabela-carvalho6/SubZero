<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Atualizar Bar</title> 
</head>
<body>

    <h1>Atualizar Bar</h1>

    <form action="/SubZero/public/update-bar" method="POST">
 
        <input type="hidden" name="id_bar" value="<?= $barInfo['id_bar'] ?>">

        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" value="<?php echo $barInfo['nome_completo']; ?>" required><br><br>

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" value="<?php echo $barInfo['email']; ?>" required><br><br>

        <label for="cep">CEP:</label>
        <input type="number" id="cep" name="cep" value="<?php echo $barInfo['cep']; ?>" required><br><br>

        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" value="<?php echo $barInfo['numero']; ?>" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" value="<?php echo $barInfo['tipo']; ?>" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" value="<?php echo $barInfo['senha']; ?>" required><br><br>

        <input type="submit" value="Atualizar Bar">
    </form>

    <a href="/SubZero/public/list-bar">Voltar para a lista</a>


</body>
</html>
