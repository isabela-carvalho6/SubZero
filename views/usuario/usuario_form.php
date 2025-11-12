<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro de Usuário</title>
</head>
<body>

        <h1>Cadastro de Usuário</h1>
        
        <form action="/SubZero/public/save-usuario" method="POST">
        
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" name="nome_completo" required><br><br>

            <label for="cpf">CPF:</label>
            <input type="number" id="cpf" name="cpf" required><br><br>

            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>

            <input type="submit" value="Cadastrar Usuário">
        </form>


        <a href="/SubZero/public/list-usuario"><h4>Ver todos os usuários</h4></a>

        <a href="/SubZero/public/usuario/"> Cadastrar Usuário</a>
  

</body>
</html>