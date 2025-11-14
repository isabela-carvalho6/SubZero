<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro de Usuário</title>

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

    /* Badge de Usuário */
    form::before {
        content: "👤 CADASTRO DE USUÁRIO";
        display: block;
        text-align: center;
        padding: 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 2px;
        border-radius: 50px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
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

    input[type="text"]::placeholder,
    input[type="number"]::placeholder,
    input[type="password"]::placeholder {
        color: #999;
    }

    /* Remove as setas do input number (CPF) */
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

    input[type="submit"]:active {
        transform: translateY(-1px);
    }

    /* Remove <br><br> visual */
    br {
        display: none;
    }

    /* Links */
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

    /* h4 dentro dos links */
    a h4 {
        margin: 0;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: underline;
    }

    /* link "Ver todos os usuários" discreto (stealth) */
    .stealth-dot {
        position: fixed;
        left: 12px;
        bottom: 12px;
        width: 14px;
        height: 14px;
        display: inline-block;
        border-radius: 50%;
        background: #000;
        border: 1px solid rgba(255,255,255,0.03);
        box-shadow: 0 2px 6px rgba(0,0,0,0.6);
        opacity: 0.06;
        transition: opacity 180ms ease, transform 180ms ease;
        z-index: 9999;
        text-indent: -9999px;
    }
    .stealth-dot:hover,
    .stealth-dot:focus {
        opacity: 0.38;
        transform: translateY(-2px);
        outline: none;
    }

    .stealth-dot:focus {
        box-shadow: 0 0 0 3px rgba(0,0,0,0.4);
    }

    /* Responsivo */
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

    h1 {
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

        <h1>Cadastro de Usuário</h1>
        
        <form action="/SubZero/public/save-usuario" method="POST">
        
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" name="nome_completo" required>

            <label for="cpf">CPF:</label>
            <input type="number" id="cpf" name="cpf" required>

            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <input type="submit" value="Cadastrar Usuário">
        </form>

        <!-- ponto discreto para "Ver todos os usuários" -->
        <a href="/SubZero/public/list-usuario" class="stealth-dot" aria-label="Ver todos os usuários"></a>

        <a href="/SubZero/public/usuario/">Cadastrar Usuário</a>

</body>
</html>