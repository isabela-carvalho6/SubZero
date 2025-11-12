<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Atualizar Administrador</title> 
</head>
<body>

    <h2>Atualizar Administrador</h2>
    <form method="POST" action="/SubZero/public/update-adm">
        <input type="hidden" name="id_adm" value="<?= $admInfo['id_adm'] ?>">
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" name="nome_completo" value="<?= $admInfo['nome_completo'] ?>" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" value="<?= $admInfo['senha'] ?>" required><br>
        <button type="submit">Salvar</button>
    </form>

    <a href="/SubZero/public/list-adm">Voltar para a lista</a>


</body>
</html>
