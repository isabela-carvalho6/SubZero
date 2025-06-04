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
        <input type="hidden" name="id_bebida" value="<?= $bebidaInfo['id_bebida'] ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $bebidaInfo['nome'] ?>" required><br><br>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="<?= $bebidaInfo['descricao'] ?>" required><br><br>

        <label for="ingredientes">Ingredientes:</label>
        <input type="text" id="ingredientes" name="ingredientes" value="<?= $bebidaInfo['ingredientes'] ?>" required><br><br>

        <label for="instrucoes">Instruções:</label>
        <input type="text" id="instrucoes" name="instrucoes" value="<?= $bebidaInfo['instrucoes'] ?>" required><br><br>

        <button type="submit">Atualizar Bebida</button>
    </form>

    <a href="/dev_pub/list-bebida">Voltar para a lista</a>


</body>
</html>
