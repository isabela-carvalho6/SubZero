<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro de Administrador</title>
</head>
<body>

        <h1>Cadastro de Administrador</h1>
        
        <form action="/SubZero/public/save-adm" method="POST">
        
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" id="nome_completo" name="nome_completo" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>

            <input type="submit" value="Cadastrar Admnistrador">
        </form>


        <a href="/SubZero/public/list-adm"><h4>Ver todos os administradores</h4></a>

        <a href="/SubZero/public/adm/"> Cadastrar administrador</a>
  

</body>
</html>