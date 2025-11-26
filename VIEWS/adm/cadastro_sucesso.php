<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administrador - Sucesso</title>
    <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                    url('https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1920') center/cover no-repeat fixed;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        color: #fff;
    }
    .card {
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(10px);
        padding: 40px 50px;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.4);
        max-width: 600px;
        width: 100%;
        text-align: center;
    }
    h1 { font-size: 2rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 12px; }
    p { color: rgba(255,255,255,0.9); margin-bottom: 20px; }
    .actions { display:flex; gap:12px; justify-content:center; flex-wrap:wrap; }
    .btn { display:inline-block; padding:12px 26px; border-radius:50px; text-decoration:none; color:#fff; font-weight:700; background:#000; box-shadow:0 8px 25px rgba(0,0,0,0.4); }
    .btn.secondary { background: rgba(255,255,255,0.08); border: 2px solid rgba(255,255,255,0.12); color:#fff; font-weight:600; }
    .btn:hover { transform: translateY(-3px); }
    @media (max-width:768px){ .card{padding:30px 20px} h1{font-size:1.6rem} }
    </style>
</head>
<body>
    <div class="card">
        <h1>Administrador cadastrado!</h1>
        <p>O administrador foi criado com sucesso.</p>
        <div class="actions">
            <a class="btn" href="/SubZero/public/adm/">Cadastrar outro administrador</a>
            <a class="btn secondary" href="/SubZero/public/list-adm">Ver administradores</a>
        </div>
    </div>
</body>
</html>
