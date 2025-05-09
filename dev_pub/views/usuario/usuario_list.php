<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Usuários Cadastrados</title> 
</head>
<body>

    <h1>Usuários Cadastrados</h1>

    <table border="1">
        <tr>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Senha</th>
        </tr>

        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['nome_completo']; ?></td>
            <td><?php echo $usuario['cpf']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo $usuario['senha']; ?></td>
            

            <td>
                <a href="/dev_pub/update-usuario/<?php echo $usuario['id']; ?>">Atualizar</a>

                <form action="/dev_pub/delete-usuario" method="POST" style="display:inline;">

                    <input type="hidden" name="nome_completo" value="<?php echo $usuario['nome_completo']; ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="/dev_pub/public/usuario/">Cadastrar novo Usuário</a>


</body>
</html>