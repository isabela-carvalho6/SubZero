<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Atualizar Administrador</title> 
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                    url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920') center/cover no-repeat fixed;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    h2 {
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
        max-width: 550px;
        width: 100%;
        margin-bottom: 30px;
    }

    /* Badge de "Editando Administrador" */
    form::before {
        content: "✏️ MODO EDIÇÃO - ADMINISTRADOR";
        display: block;
        text-align: center;
        padding: 12px;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 2px;
        border-radius: 50px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(30, 60, 114, 0.4);
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
    input[type="password"] {
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

    input[type="text"]:focus,
    input[type="password"]:focus {
        outline: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 255, 255, 0.2);
    }

    input[type="hidden"] {
        display: none;
    }

    button[type="submit"] {
        width: 100%;
        padding: 18px;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(30, 60, 114, 0.4);
        margin-top: 10px;
    }

    button[type="submit"]:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(30, 60, 114, 0.6);
    }

    button[type="submit"]:active {
        transform: translateY(-1px);
    }

    /* Remove <br> visual */
    br {
        display: none;
    }

    /* Link voltar */
    a {
        color: #ffffff;
        text-decoration: none;
        font-size: 1rem;
        font-weight: 500;
        padding: 14px 35px;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        display: inline-block;
        margin-top: 10px;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    a:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
    }

    /* Responsivo */
    @media (max-width: 768px) {
        h2 {
            font-size: 2rem;
        }
        
        form {
            padding: 30px 25px;
        }
        
        body {
            padding: 20px 15px;
        }
    }

    /* Animações de entrada */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h2 {
        animation: fadeInUp 0.4s ease;
    }

    form {
        animation: fadeInUp 0.6s ease;
    }

    a {
        animation: fadeInUp 0.8s ease;
    }
    </style>
</head>
<body>

    <h2>Atualizar Administrador</h2>
    
    <form method="POST" action="/SubZero/public/update-adm">
        <input type="hidden" name="id_adm" value="<?= $admInfo['id_adm'] ?>">
        
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" name="nome_completo" value="<?= $admInfo['nome_completo'] ?>" required>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" value="<?= $admInfo['senha'] ?>" required>
        
        <button type="submit">Salvar</button>
    </form>

    <a href="/SubZero/public/list-adm">Voltar para a lista</a>

</body>
</html>
