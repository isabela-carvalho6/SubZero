<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro realizado</title>
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)),
                        url('https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=1920') center/cover no-repeat fixed;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:40px 20px;
            color:#fff;
        }

        .card{
            width:100%;
            max-width:640px;
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(10px);
            padding:36px 40px;
            border-radius:16px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.6);
            text-align:center;
        }

        h1{font-size:1.8rem;color:#ffffff;margin-bottom:12px;font-weight:700}
        p{color:rgba(255,255,255,0.85);margin-bottom:20px;font-size:1rem}

        .actions{
            display:flex;gap:12px;justify-content:center;flex-wrap:wrap;margin-top:8px
        }

        .btn{
            display:inline-block;padding:12px 20px;border-radius:50px;text-decoration:none;font-weight:700;
            color:#fff;background:rgba(0,0,0,0.85);border:2px solid rgba(255,255,255,0.06);
            transition:transform .18s ease,background .18s ease;
        }
        .btn:hover{transform:translateY(-3px);background:#000}

        .secondary{
            background:transparent;border:2px solid rgba(255,255,255,0.12);
            color:rgba(255,255,255,0.95)
        }

        @media (max-width:600px){
            .card{padding:24px}
            h1{font-size:1.5rem}
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Cadastro realizado com sucesso!</h1>
        <p>Seu bar foi cadastrado corretamente. Obrigado por colaborar com o SubZero.</p>
        <div class="actions">
            <a class="btn" href="/SubZero/public/bar/">Cadastrar outro bar</a>
            <a class="btn secondary" href="/SubZero/views/Home_Italo/home.html">Ir para a página inicial</a>
        </div>
    </div>
</body>
</html>
