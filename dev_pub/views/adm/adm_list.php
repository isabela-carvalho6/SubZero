<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Administradores Cadastrados</title> 
</head>
<body>

    <h1>Administradores Cadastrados</h1>

    <table border="1">
        <tr>
            <th>Nome Completo</th>
            <th>Senha</th>
        </tr>

        <?php foreach ($adms as $adm): ?>
        <tr>
            <td><?php echo $adm['nome_completo']; ?></td>
            <td><?php echo $adm['senha']; ?></td>

            <td>
                <a href="/dev_pub/update-adm/<?php echo $adm['id']; ?>">Atualizar</a>

                <form action="/dev_pub/delete-adm" method="POST" style="display:inline;">

                    <input type="hidden" name="nome_completo" value="<?php echo $adm['nome_completo']; ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="/dev_pub/public/adm/">Cadastrar novo administrador</a>


</body>
</html>