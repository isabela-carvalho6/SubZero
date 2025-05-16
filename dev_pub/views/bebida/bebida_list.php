<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Bebidas Cadastradas</title> 
</head>
<body>

    <h1>Bebidas Cadastradas</h1>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ingredientes</th>
            <th>Instruções</th>
        </tr>

        <?php foreach ($bebidas as $bebida): ?>
        <tr>
            <td><?php echo $bebida['nome']; ?></td>
            <td><?php echo $bebida['descricao']; ?></td>
            <td><?php echo $bebida['ingredientes']; ?></td>
            <td><?php echo $bebida['instrucoes']; ?></td>
            

            <td>
                <a href="/dev_pub/update-bebida/<?php echo $bebida['id']; ?>">Atualizar</a>

                <form action="/dev_pub/delete-bebida" method="POST" style="display:inline;">

                    <input type="hidden" name="nome" value="<?php echo $bebida['nome']; ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="/dev_pub/public/bebida/">Cadastrar nova bebida</a>


</body>
</html>