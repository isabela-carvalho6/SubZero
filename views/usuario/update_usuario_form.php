<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Atualizar Usuário</title> 
</head>
<body>

    <h1>Atualizar Usuário</h1>

    <form action="/SubZero/public/update-usuario" method="POST">
 
        <input type="hidden" name="id" value="<?php echo $usuarioInfo['id']; ?>">

        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" value="<?php echo $usuarioInfo['nome_completo']; ?>" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="number" id="cpf" name="cpf" value="<?php echo $usuarioInfo['cpf']; ?>" required><br><br>

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" value="<?php echo $usuarioInfo['email']; ?>" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" value="<?php echo $usuarioInfo['senha']; ?>" required><br><br>

        <input type="submit" value="Atualizar Usuário">
    </form>

    <a href="/SubZero/public/list-usuario">Voltar para a lista</a>


</body>
</html>
