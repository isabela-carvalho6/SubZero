<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Bar</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('https://images.unsplash.com/photo-1566417713940-fe7c737a9ef2?w=1920') center/cover no-repeat fixed;
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
    input[type="email"],
    input[type="number"],
    input[type="password"],
    select {
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
    input[type="email"]:focus,
    input[type="number"]:focus,
    input[type="password"]:focus,
    select:focus {
        outline: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    /* Remove as setas do input number */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }

    select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 20px center;
        padding-right: 45px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 18px;
        background: linear-gradient(135deg, #000000 0%, #000000 100%);
        color: white;
        border: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.6);
    }

    input[type="submit"]:active {
        transform: translateY(-1px);
    }

    /* Link voltar */
    body > a {
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

    body > a:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-2px);
    }

    /* Oculta campo hidden */
    input[type="hidden"] {
        display: none;
    }

    /* Badge de "Editando" */
    form::before {
        content: "✏️ MODO EDIÇÃO";
        display: block;
        text-align: center;
        padding: 12px;
        background: linear-gradient(135deg, #000000 0%, #000000 100%);
        color: white;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 2px;
        border-radius: 50px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
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

    /* Animação de entrada */
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

    form {
        animation: fadeInUp 0.6s ease;
    }

    h1 {
        animation: fadeInUp 0.4s ease;
    }
    </style>
</head>
<body>

    <div class="logo-container">
        <a href="/SubZero/views/Home_Italo/home.html"><img src="/SubZero/Imagens/logo.png" alt="Logo"></a>
    </div>

    <h1>Atualizar Bar</h1>

    <form action="/SubZero/public/update-bar" method="POST">
        <input type="hidden" name="id_bar" value="<?= $barInfo['id_bar'] ?>">

        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" value="<?= htmlspecialchars($barInfo['nome_completo']) ?>" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($barInfo['email']) ?>" required><br><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" value="<?= htmlspecialchars($barInfo['cep']) ?>" required><br><br>

        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" value="<?= htmlspecialchars($barInfo['numero']) ?>" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" value="<?= htmlspecialchars($barInfo['tipo']) ?>" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" value="<?= htmlspecialchars($barInfo['senha']) ?>" required><br><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($barInfo['cidade'] ?? '') ?>" required><br><br>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="">Selecione o estado</option>
            <option value="AC" <?= ($barInfo['estado'] ?? '') == 'AC' ? 'selected' : '' ?>>Acre</option>
            <option value="AL" <?= ($barInfo['estado'] ?? '') == 'AL' ? 'selected' : '' ?>>Alagoas</option>
            <!-- ...demais estados... -->
            <option value="SP" <?= ($barInfo['estado'] ?? '') == 'SP' ? 'selected' : '' ?>>São Paulo</option>
            <!-- ... -->
        </select><br><br>

        <input type="hidden" id="endereco_completo" name="endereco_completo" value="<?= htmlspecialchars($barInfo['endereco_completo'] ?? '') ?>">

        <input type="submit" value="Atualizar Bar">
    </form>

    <a href="/SubZero/public/list-bar">Voltar para a lista</a>

    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const logradouro = document.getElementById('logradouro') ? document.getElementById('logradouro').value.trim() : '';
        const numero = document.getElementById('numero').value.trim();
        const bairro = document.getElementById('bairro') ? document.getElementById('bairro').value.trim() : '';
        const cidade = document.getElementById('cidade').value.trim();
        const estado = document.getElementById('estado').value.trim();
        const cep = document.getElementById('cep').value.trim();

        const enderecoCompleto = `${logradouro}, ${numero} - ${bairro}, ${cidade} - ${estado}, ${cep}`;
        document.getElementById('endereco_completo').value = enderecoCompleto;
        // Deixe o submit seguir normalmente
    });
    </script>

</body>
</html>
