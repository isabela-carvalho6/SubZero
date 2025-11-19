<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Atualizar Usuário</title> 

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('https://img.cdndsgni.com/preview/11131636.jpg') center/cover no-repeat fixed;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
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
        animation: fadeInUp 0.4s ease;
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
        animation: fadeInUp 0.6s ease;
    }

    /* Badge */
    form::before {
        content: "🔧 ATUALIZAR USUÁRIO";
        display: block;
        text-align: center;
        padding: 12px;
        background: linear-gradient(135deg, #00c6ff 0%, #0072ff 100%);
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 2px;
        border-radius: 50px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0, 132, 255, 0.3);
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
    input[type="number"],
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
    input[type="number"]:focus,
    input[type="password"]:focus {
        outline: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 255, 255, 0.2);
    }

    /* remover setas do input number */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
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

    br {
        display: none;
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
        animation: fadeInUp 0.8s ease;
    }

    a:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
    }

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

    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }
        
        form {
            padding: 30px 25px;
        }
        
        body {
            padding: 20px 15px;
        }
    }
    </style>
</head>

<body>

    <h1>Atualizar Usuário</h1>

    <form action="/SubZero/public/update-usuario" method="POST">
 
        <input type="hidden" name="id" value="<?php echo $usuarioInfo['id']; ?>">

        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" 
               value="<?php echo $usuarioInfo['nome_completo']; ?>" required>

        <label for="cpf">CPF:</label>
        <input type="number" id="cpf" name="cpf" 
               value="<?php echo $usuarioInfo['cpf']; ?>" required>

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" 
               value="<?php echo $usuarioInfo['email']; ?>" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" 
               value="<?php echo $usuarioInfo['senha']; ?>" required>

        <input type="submit" value="Atualizar Usuário">
    </form>

    <a href="/SubZero/public/list-usuario">Voltar para a lista</a>

</body>
</html>
