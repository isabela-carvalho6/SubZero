<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Bares Cadastrados</title> 
</head>
<body>

    <h1>Bares Cadastrados</h1>

    <table border="1">
        <tr>
            <th>Nome Completo</th>
            <th>E-mail</th>
            <th>CEP</th>
            <th>Tipo</th>
            <th>Senha</th>
        </tr>

        <?php foreach ($bares as $bar): ?>
        <tr>
            <td><?php echo $bar['nome']; ?></td>
            <td><?php echo $bar['email']; ?></td>
            <td><?php echo $bar['cep']; ?></td>
            <td><?php echo $bar['numero']; ?></td>
            <td><?php echo $bar['tipo']; ?></td>
            <td><?php echo $bar['senha']; ?></td>

            <td>
                <a href="/dev_pub/update-bar/<?php echo $bar['id']; ?>">Atualizar</a>

                <form action="/dev_pub/delete-bar" method="POST" style="display:inline;">

                    <input type="hidden" name="nome" value="<?php echo $bar['nome']; ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="/dev_pub/public/bar/">Cadastrar novo bar</a>


</body>
</html>