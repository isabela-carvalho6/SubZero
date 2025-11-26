<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Bar</title>
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
    input[type="password"]:focus,
    select:focus {
        outline: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    input[type="text"]::placeholder,
    input[type="password"]::placeholder {
        color: #999;
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
        background: linear-gradient(135deg, #000000ff 0%, #000000ff 100%);
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

    /* Oculta campos de latitude/longitude visualmente mas mantém funcionais */
    input#latitude,
    input#longitude,
    label[for="latitude"],
    label[for="longitude"] {
        position: absolute;
        left: -9999px;
        width: 1px;
        height: 1px;
        overflow: hidden;
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
    /* Botão fixo inferior esquerdo (mesmo esquema das outras páginas) */
    .back-button {
        color: #fff;
        font-size: 18px;
        text-decoration: none;
        position: fixed;
        bottom: 30px;
        left: 20px;
        background-color: rgba(0,0,0,0.7);
        padding: 12px 16px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.4);
        transition: background-color 0.3s ease, transform 0.3s ease;
        z-index: 999;
    }

    .back-button:hover {
        background-color: #C0392B;
        transform: scale(1.05);
    }
    </style>
</head>
<body>

    <div class="logo-container">
        <a href="/SubZero/views/Home_Italo/home.html"><img src="/SubZero/Imagens/logo.png" alt="Logo"></a>
    </div>

    <h1>Cadastro de Bar</h1>
    <!-- #region -->    
    <form action="/SubZero/public/save-bar" method="POST">
        <label for="nome_completo">Nome:</label>
        <input type="text" id="nome_completo" name="nome_completo" required><br><br>

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="logradouro">Logradouro (Rua/Avenida):</label>
        <input type="text" id="logradouro" name="logradouro" required><br><br>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" required><br><br>

        <label for="bairro">Bairro:</label>
        <input type="text" id="bairro" name="bairro" required><br><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" required><br><br>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="">Selecione o estado</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
        </select><br><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required><br><br>

    <input type="hidden" id="endereco_completo" name="endereco_completo">
    <label for="latitude">Latitude:</label>
    <input type="text" id="latitude" name="latitude" required><br><br>
    <label for="longitude">Longitude:</label>
    <input type="text" id="longitude" name="longitude" required><br><br>
    <input type="submit" value="Cadastrar Bar">
    </form>

    <!-- botão fixo inferior esquerdo (mesmo esquema das outras páginas) -->
    <a class="back-button" href="/SubZero/views/Home_Italo/home.html">Voltar</a>

    <script>
    // Envia o formulário via fetch, mostra mensagem de sucesso e redireciona (comportamento parecido com a outra página de cadastro)
    (function() {
        const form = document.querySelector('form');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Monta o endereço completo antes de enviar
            const logradouro = document.getElementById('logradouro').value.trim();
            const numero = document.getElementById('numero').value.trim();
            const bairro = document.getElementById('bairro').value.trim();
            const cidade = document.getElementById('cidade').value.trim();
            const estado = document.getElementById('estado').value.trim();
            const cep = document.getElementById('cep').value.trim();

            const enderecoCompleto = `${logradouro}, ${numero} - ${bairro}, ${cidade} - ${estado}, ${cep}`;
            document.getElementById('endereco_completo').value = enderecoCompleto;

            // Envia via fetch (mesmo destino do form)
            fetch(form.action, { method: 'POST', body: new FormData(form) })
                .then(response => {
                    if (response.ok) {
                        // mostra mensagem temporária de sucesso
                        const msg = document.createElement('div');
                        msg.textContent = 'Cadastro realizado com sucesso!';
                        msg.style.cssText = 'position:fixed; top:20px; left:50%; transform:translateX(-50%); background:#23b7d9; color:#000; padding:12px 18px; border-radius:8px; z-index:10000; font-weight:700;';
                        document.body.appendChild(msg);

                        setTimeout(() => {
                            // redireciona para home (ajuste o caminho se necessário)
                            window.location.href = '/SubZero/views/Home_Italo/home.html';
                        }, 1800);
                    } else {
                        return response.text().then(text => { throw new Error(text || 'Erro ao cadastrar'); });
                    }
                })
                .catch(err => {
                    console.error('Erro no envio do formulário:', err);
                    alert('Ocorreu um erro ao cadastrar. Confira os dados e tente novamente.');
                });
        });
    })();
    </script>
</body>
</html>