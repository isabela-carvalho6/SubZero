<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro de Bebida</title>
</head>
<body>

        <h1>Cadastro de Bebida</h1>
        
        <form action="/dev_pub/save-bebida" method="POST">
        
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required><br><br>

            <label for="ingredientes">Ingredientes:</label>
            <input type="text" id="ingredientes" name="ingredientes" required><br><br>

            <label for="instrucoes">Instruções:</label>
            <input type="text" id="instrucoes" name="instrucoes" required><br><br>

            <input type="submit" value="Cadastrar Bebida">
        </form>


        <a href="/dev_pub/list-bebida"><h4>Ver todas as bebidas</h4></a>

        <a href="http://localhost/dev_pub/public/"> Cadastrar Bebida</a>
  

</body>
</html>