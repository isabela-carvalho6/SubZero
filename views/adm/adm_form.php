<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro de Administrador</title>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                    url('https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1920') center/cover no-repeat fixed;
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

    /* Badge de Admin */
    form::before {
        content: "👨‍💼 ÁREA ADMINISTRATIVA";
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

    input[type="text"]::placeholder,
    input[type="password"]::placeholder {
        color: #999;
    }

    /* botão submit - alterado para preto */
    input[type="submit"] {
        width: 100%;
        padding: 18px;
        background: #000000;
        color: #ffffff;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.7);
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.85);
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

    /* Remove o <br><br> visual */
    br {
        display: none;
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

    /* link "Ver todos os administradores" discreto (stealth) */
    .stealth-dot {
        position: fixed;
        left: 12px;              /* mude a posição se preferir */
        bottom: 12px;
        width: 14px;
        height: 14px;
        display: inline-block;
        border-radius: 50%;
        background: #000;        /* bolinha preta */
        border: 1px solid rgba(255,255,255,0.03);
        box-shadow: 0 2px 6px rgba(0,0,0,0.6);
        opacity: 0.06;           /* quase invisível */
        transition: opacity 180ms ease, transform 180ms ease;
        z-index: 9999;           /* sobreponha conteúdo */
        text-indent: -9999px;    /* esconde texto caso exista */
    }
    .stealth-dot:hover,
    .stealth-dot:focus {
        opacity: 0.38;           /* fica mais visível ao passar/foocar */
        transform: translateY(-2px);
        outline: none;
    }

    /* mantém acessibilidade sem exibir texto */
    .stealth-dot:focus {
        box-shadow: 0 0 0 3px rgba(0,0,0,0.4);
    }
    </style>

</head>
<body>

        <h1>Cadastro de Administrador</h1>
        
        <form action="/SubZero/public/save-adm" method="POST">
        
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" id="nome_completo" name="nome_completo" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <input type="submit" value="Cadastrar Admnistrador">
        </form>

        <!-- ponto discreto para "Ver todos os administradores" -->
        <a href="/SubZero/public/list-adm" class="stealth-dot" aria-label="Ver todos os administradores"></a>

        <a href="/SubZero/public/adm/"> Cadastrar administrador</a>
  
</body>
</html>