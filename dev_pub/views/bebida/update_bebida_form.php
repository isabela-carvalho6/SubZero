<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Atualizar Bebida</title> 
</head>
<body>

    <h1>Atualizar Bebida</h1>

    <form action="/dev_pub/update-bebida" method="POST">
 
        <input type="hidden" name="id" value="<?php echo $bebidaInfo['id']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $bebidaInfo['nome']; ?>" required><br><br>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="<?php echo $bebidaInfo['descricao']; ?>" required><br><br>

        <label for="ingredientes">Ingredientes:</label>
        <input type="text" id="ingredientes" name="ingredientes" value="<?php echo $bebidaInfo['ingredientes']; ?>" required><br><br>

        <label for="instrucoes">Instruções:</label>
        <input type="text" id="instrucoes" name="instrucoes" value="<?php echo $bebidaInfo['instrucoes']; ?>" required><br><br>

        <input type="submit" value="Atualizar Bebida">
    </form>

    <a href="/dev_pub/list-bebida">Voltar para a lista</a>


</body>
</html>
