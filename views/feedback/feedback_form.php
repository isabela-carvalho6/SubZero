<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Feedback</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 40px 20px 120px 20px;
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
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
        }
        form {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 50px 60px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            max-width: 600px;
            width: 100%;
            margin-bottom: 30px;
        }
        label {
            display: block;
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 16px 20px;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            background: #ffffff;
            color: #333;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        textarea {
            border-radius: 20px;
            resize: vertical;
            min-height: 120px;
        }
        input[type="text"]:focus,
        input[type="date"]:focus,
        textarea:focus {
            outline: none;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.2);
        }
        input[type="submit"] {
            width: 100%;
            padding: 18px;
            background: #000000;
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.7);
        }
        a {
            color: #ffffff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            padding: 12px 30px;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            display: inline-block;
            margin: 10px;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }
        a h4 {
            margin: 0;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: underline;
        }
    </style>tyle>
</head>
<body>

        <div class="logo-container">
            <a href="/SubZero/views/Home_Italo/home.html"><img src="/SubZero/Imagens/logo.png" alt="Logo"></a>
        </div>

        <h1>Feedback</h1>
        
        <form action="/SubZero/public/save-feedback" method="POST">
        
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required><br><br>

            <label for="data_feedback">Data:</label>
            <input type="date" id="data_feedback" name="data_feedback" required><br><br>

            <label for="mensagem">Mensagem:</label>
            <textarea name="mensagem" required></textarea><br><br>

            <input type="submit" value="Postar feedback">
        </form>


        <a href="/SubZero/public/list-feedback"><h4>Ver todos os feedbacks</h4></a>
        <a href="/SubZero/public/feedback/">Postar Feedback</a>

        <form method="POST" action="/dev_pub/delete-feedback">
            <input type="hidden" name="id_feedback" value="<?= $feedback['id_feedback'] ?>">
        </form>
  

</body>
</html>