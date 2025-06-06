<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro de Bar</title>
</head>
<body>

        <h1>Cadastro de Bar</h1>
        
        <form action="/SubZero/public/save-bar" method="POST">
        
            <label for="nome_completo">Nome:</label>
            <input type="text" id="nome_completo" name="nome_completo" required><br><br>

            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" required><br><br>

            <label for="cep">CEP:</label>
            <input type="number" id="cep" name="cep" required><br><br>

            <label for="numero">Número:</label>
            <input type="number" id="numero" name="numero" required><br><br>

            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>

            <input type="submit" value="Cadastrar Bar">
        </form>

        <a href="/SubZero/public/list-bar"><h4>Ver todos os bares</h4></a>
        <a href="/SubZero/public/bar/">Cadastrar bar</a>
        <form method="POST" action="/SubZero/public/delete-bar">
            <input type="hidden" name="id_bar" value="<?= $bar['id_bar'] ?>">
        </form>
</body>
</html>