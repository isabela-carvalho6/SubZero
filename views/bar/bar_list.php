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
            <th>Número</th>
            <th>Tipo</th>
            <th>Latitude</th>      <!-- Adicionado -->
            <th>Longitude</th>     <!-- Adicionado -->
            <th>Senha</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($bares as $bar): ?>
        <tr>
            <td><?= htmlspecialchars($bar['nome_completo'] ?? '') ?></td>
            <td><?= htmlspecialchars($bar['email'] ?? '') ?></td>
            <td><?= htmlspecialchars($bar['cep'] ?? '') ?></td>
            <td><?= htmlspecialchars($bar['numero'] ?? '') ?></td>
            <td><?= htmlspecialchars($bar['tipo'] ?? '') ?></td>
            <td><?= htmlspecialchars($bar['latitude'] ?? '') ?></td>
            <td><?= htmlspecialchars($bar['longitude'] ?? '') ?></td>
            <td><?= htmlspecialchars($bar['senha'] ?? '') ?></td>
            <td>
                <a href="/SubZero/public/update-bar/<?= $bar['id_bar'] ?>">Atualizar</a>
                <form method="POST" action="/SubZero/public/delete-bar" style="display:inline;">
                    <input type="hidden" name="id_bar" value="<?= $bar['id_bar'] ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="/SubZero/public/bar/">Cadastrar novo bar</a>

</body>
</html>