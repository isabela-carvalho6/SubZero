<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Administradores Cadastrados</title> 
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)),
                    url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1920') center/cover no-repeat fixed;
        min-height: 100vh;
        padding: 40px 20px;
        color: #ffffff;
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

    /* Badge indicador de área administrativa */
    h1::before {
        content: "👨‍💼";
        display: block;
        font-size: 3rem;
        margin-bottom: 15px;
    }

    /* Container para a tabela com scroll horizontal em telas pequenas */
    .table-container {
        width: 100%;
        overflow-x: auto;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto 30px;
        border-collapse: separate;
        border-spacing: 0;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    }

    th {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: #ffffff;
        padding: 20px 15px;
        text-align: left;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    th:first-child {
        border-top-left-radius: 15px;
    }

    th:last-child {
        border-top-right-radius: 15px;
    }

    td {
        padding: 18px 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: #ffffff;
        font-size: 0.95rem;
    }

    tr:hover {
        background: rgba(255, 255, 255, 0.08);
        transition: all 0.3s ease;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:last-child td:first-child {
        border-bottom-left-radius: 15px;
    }

    tr:last-child td:last-child {
        border-bottom-right-radius: 15px;
    }

    /* Botões de ação */
    td a,
    td button {
        display: inline-block;
        padding: 8px 16px;
        margin: 2px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    td a {
        background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
    }

    td a:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 60, 114, 0.5);
    }

    td button {
        background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(244, 67, 54, 0.3);
    }

    td button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(244, 67, 54, 0.5);
    }

    td button:active,
    td a:active {
        transform: translateY(0);
    }

    /* Link de cadastrar novo administrador */
    body > a {
        display: inline-block;
        padding: 16px 40px;
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        box-shadow: 0 8px 25px rgba(30, 60, 114, 0.4);
        transition: all 0.3s ease;
        margin: 20px auto;
        display: block;
        width: fit-content;
    }

    body > a:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(30, 60, 114, 0.6);
    }

    /* Form inline para botão de excluir */
    form[style*="inline"] {
        display: inline-block;
        margin: 0;
    }

    /* Mensagem quando não há administradores */
    .no-data {
        text-align: center;
        padding: 60px 20px;
        color: rgba(255, 255, 255, 0.7);
        font-size: 1.2rem;
    }

    /* Segurança: obscurecer senha parcialmente */
    td:nth-child(2) {
        font-family: 'Courier New', monospace;
        letter-spacing: 2px;
    }

    /* Responsivo */
    @media (max-width: 1200px) {
        table {
            font-size: 0.9rem;
        }
        
        th, td {
            padding: 15px 10px;
        }
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }
        
        body {
            padding: 20px 10px;
        }
        
        table {
            font-size: 0.8rem;
        }
        
        th, td {
            padding: 12px 8px;
        }
        
        td a,
        td button {
            padding: 6px 12px;
            font-size: 0.75rem;
        }
        
        body > a {
            padding: 14px 30px;
            font-size: 1rem;
        }
    }

    /* Scroll bar customizada */
    .table-container::-webkit-scrollbar {
        height: 10px;
    }

    .table-container::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .table-container::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        border-radius: 10px;
    }

    .table-container::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
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

    table {
        animation: fadeInUp 0.6s ease;
    }

    body > a {
        animation: fadeInUp 0.8s ease;
    }
    </style>
</head>
<body>

    <h1>Administradores Cadastrados</h1>

    <div class="table-container">
    <table>
        <tr>
            <th>Nome Completo</th>
            <th>Senha</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($adms as $adm): ?>
        <tr>
            <td><?php echo htmlspecialchars($adm['nome_completo'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($adm['senha'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td>
                <a href="/SubZero/public/update-adm/<?php echo $adm['id_adm']; ?>">Atualizar</a>
                <form action="/SubZero/public/delete-adm" method="POST" style="display:inline;">
                    <input type="hidden" name="id_adm" value="<?php echo $adm['id_adm']; ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>

    <a href="/SubZero/public/adm/">Cadastrar novo administrador</a>

</body>
</html>