<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - Sucesso</title>
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

    .card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        padding: 40px 50px;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
        max-width: 600px;
        width: 100%;
        text-align: center;
        color: #fff;
    }

    h1 {
        color: #ffffff;
        font-size: 2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 12px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
    }

    p {
        color: rgba(255,255,255,0.85);
        margin-bottom: 20px;
        font-size: 1rem;
    }

    .actions {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-block;
        padding: 12px 26px;
        border-radius: 50px;
        text-decoration: none;
        color: #fff;
        font-weight: 700;
        background: linear-gradient(135deg, #000000 0%, #000000 100%);
        box-shadow: 0 8px 25px rgba(0,0,0,0.4);
        transition: all 0.25s ease;
    }

    .btn.secondary {
        background: rgba(255,255,255,0.08);
        border: 2px solid rgba(255,255,255,0.12);
        color: #fff;
        font-weight: 600;
    }

    .btn:hover { transform: translateY(-3px); }

    @media (max-width: 768px) {
        .card { padding: 30px 20px; }
        h1 { font-size: 1.6rem; }
    }
    </style>
</head>
<body>

    <div class="card">
        <h1>Cadastro realizado com sucesso!</h1>
        <p>Seu usuário foi cadastrado corretamente.</p>
        <div class="actions">
            <a class="btn" href="/SubZero/public/usuario/">Cadastrar outro usuário</a>
            <a class="btn secondary" href="/SubZero/public/Login">Ir para login</a>
        </div>
    </div>

</body>
</html>
