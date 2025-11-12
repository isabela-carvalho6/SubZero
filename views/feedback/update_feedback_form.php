<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Atualizar Feedback</title> 
</head>
<body>

    <h1>Atualizar Feedback</h1>

    <form method="POST" action="/SubZero/public/update-feedback">
        <input type="hidden" name="id_feedback" value="<?= $feedbackInfo['id_feedback'] ?>">

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?= $feedbackInfo['titulo'] ?>" required><br><br>

        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" required><?= $feedbackInfo['mensagem'] ?></textarea><br><br>

        <label for="data_feedback">Data:</label>
        <input type="date" id="date_feedback" name="data_feedback" value="<?php echo $feedbackInfo['data_feedback']; ?>" required><br><br>

        <input type="submit" value="Atualizar Feedback">
    </form>

    <a href="/SubZero/public/list-feedback">Voltar para os feedbacks</a>

</body>
</html>
