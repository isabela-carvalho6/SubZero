<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Feedback</title>
</head>
<body>

        <h1>Feedback</h1>
        
        <form action="/dev_pub/save-feedback" method="POST">
        
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br><br>

            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required><br><br>

            <label for="data_feedback">Data:</label>
            <input type="date" id="data_feedback" name="data_feedback" required><br><br>

            <label for="mensagem">Mensagem:</label>
            <textarea name="mensagem" required></textarea><br><br>

            <input type="submit" value="Postar feedback">
        </form>


        <a href="/dev_pub/list-feedback"><h4>Ver todos os feedbacks</h4></a>

        <a href="http://localhost/dev_pub/public/feedback/"> Postar Feedback</a>

        <form method="POST" action="/dev_pub/delete-feedback">
            <input type="hidden" name="id_feedback" value="<?= $feedback['id_feedback'] ?>">
        </form>
  

</body>
</html>