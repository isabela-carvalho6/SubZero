<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Feedbacks Postados</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                        url('https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=1920') center/cover no-repeat fixed;
            min-height: 100vh;
            padding: 40px 20px;
            color: #ffffff;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px 0;
            margin-top: 20px;
        }
        .logo-container a {
            display: inline-block;
            transition: transform 0.3s ease;
        }
        .logo-container a:hover {
            transform: scale(1.1);
        }
        .logo-container img {
            height: 100px;
            width: auto;
            object-fit: contain;
        }
        h1 {
            color: #ffffff;
            font-size: 2.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 40px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ffffff;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>tyle>
</head>
<body>

    <div class="logo-container">
        <a href="/SubZero/views/Home_Italo/home.html"><img src="/SubZero/Imagens/logo.png" alt="Logo"></a>
    </div>

    <h1>Feedbacks Postados</h1>

    <table border="1">
        <tr>
            <th>Título</th>
            <th>Mensagem</th>
            <th>Data</th>
        </tr>

        <?php foreach ($feedbacks as $feedback): ?>
        <tr>
            <td><?php echo $feedback['titulo']; ?></td>
            <td><?php echo $feedback['mensagem']; ?></td>
            <td><?php echo $feedback['data_feedback']; ?></td>
            <td>
                <a href="/SubZero/public/update-feedback/<?= $feedback['id_feedback'] ?>">Atualizar</a>
                <form method="POST" action="/SubZero/public/delete-feedback" style="display:inline;">
                    <input type="hidden" name="id_feedback" value="<?= $feedback['id_feedback'] ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="/SubZero/public/feedback/">Postar Novo Feedback</a>


</body>
</html>