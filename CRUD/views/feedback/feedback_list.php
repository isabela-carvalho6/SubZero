<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Feedbacks Postados</title> 
</head>
<body>

    <h1>Feedbacks Postados</h1>

    <table border="1">
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Data</th>
        </tr>

        <?php foreach ($feedbacks as $feedback): ?>
        <tr>
            <td><?php echo $feedback['titulo']; ?></td>
            <td><?php echo $feedback['descricao']; ?></td>
            <td><?php echo $feedback['data_feedback']; ?></td>
            

            <td>
                <a href="/dev_pub/update-feedback/<?php echo $feedback['id']; ?>">Atualizar</a>

                <form action="/dev_pub/delete-feedback" method="POST" style="display:inline;">

                    <input type="hidden" name="titulo" value="<?php echo $feedback['titulo']; ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="/dev_pub/public/feedback/">Postar Novo Feedback</a>


</body>
</html>