<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Bebidas Cadastradas</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Georgia', serif;
        background: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)),
                    url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=1920') center/cover no-repeat fixed;
        min-height: 100vh;
        padding: 40px 20px;
        color: #ffffff;
    }

    h1 {
        color: #ffffff;
        font-size: 3rem;
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 4px;
        margin-bottom: 50px;
        text-align: center;
        text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.9);
        font-family: 'Georgia', serif;
    }

    /* Container para scroll em mobile */
    .table-wrapper {
        width: 100%;
        overflow-x: auto;
        margin-bottom: 40px;
    }

    table {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto 40px;
        border-collapse: separate;
        border-spacing: 0;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6);
    }

    th {
        background: rgba(255, 255, 255, 0.95);
        color: #000000;
        padding: 22px 18px;
        text-align: left;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 0.9rem;
        font-family: 'Georgia', serif;
    }

    th:first-child {
        border-top-left-radius: 20px;
    }

    th:last-child {
        border-top-right-radius: 20px;
    }

    td {
        padding: 20px 18px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        color: #ffffff;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    tr:hover {
        background: rgba(255, 255, 255, 0.1);
        transition: all 0.4s ease;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:last-child td:first-child {
        border-bottom-left-radius: 20px;
    }

    tr:last-child td:last-child {
        border-bottom-right-radius: 20px;
    }

    /* Botões de ação */
    td a,
    td button {
        display: inline-block;
        padding: 10px 20px;
        margin: 3px;
        border-radius: 25px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: 'Georgia', serif;
    }

    td a {
        background: #ffffff;
        color: #000000;
        box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
    }

    td a:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 25px rgba(255, 255, 255, 0.5);
        background: #f0f0f0;
    }

    td button {
        background: #000000;
        color: #ffffff;
        border: 2px solid #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
    }

    td button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 25px rgba(255, 255, 255, 0.4);
        background: #1a1a1a;
    }

    td button:active,
    td a:active {
        transform: translateY(0);
    }

    /* Link de cadastrar nova bebida */
    body > a {
        display: inline-block;
        padding: 18px 45px;
        background: #ffffff;
        color: #000000;
        text-decoration: none;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        box-shadow: 0 8px 30px rgba(255, 255, 255, 0.4);
        transition: all 0.4s ease;
        margin: 20px auto;
        display: block;
        width: fit-content;
        font-family: 'Georgia', serif;
    }

    body > a:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(255, 255, 255, 0.6);
        background: #f5f5f5;
    }

    /* Form inline para botão de excluir */
    form[style*="inline"] {
        display: inline-block;
        margin: 0;
    }

    /* Mensagem quando não há bebidas */
    .no-data {
        text-align: center;
        padding: 80px 20px;
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.3rem;
        font-style: italic;
    }

    /* Responsivo */
    @media (max-width: 1200px) {
        table {
            font-size: 0.9rem;
        }
        
        th, td {
            padding: 18px 12px;
        }
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 2.2rem;
            letter-spacing: 2px;
        }
        
        body {
            padding: 25px 12px;
        }
        
        table {
            font-size: 0.8rem;
        }
        
        th, td {
            padding: 15px 10px;
        }
        
        td a,
        td button {
            padding: 8px 14px;
            font-size: 0.75rem;
        }
        
        body > a {
            padding: 16px 35px;
            font-size: 1rem;
        }
    }

    /* Scroll bar customizada */
    .table-wrapper::-webkit-scrollbar {
        height: 12px;
    }

    .table-wrapper::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
    }

    .table-wrapper::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.5);
        border-radius: 10px;
    }

    .table-wrapper::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.7);
    }

    /* Animações de entrada */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h1 {
        animation: fadeIn 0.6s ease;
    }

    table {
        animation: fadeIn 0.8s ease;
    }

    body > a {
        animation: fadeIn 1s ease;
    }
    </style>
</head>
<body>

    <h1>Bebidas Cadastradas</h1>

    <div class="table-wrapper">
        <table>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ingredientes</th>
                <th>Instruções</th>
                <th>Ações</th>
            </tr>

            <?php foreach ($bebidas as $bebida): ?>
            <tr>
                <td><?php echo $bebida['nome']; ?></td>
                <td><?php echo $bebida['descricao']; ?></td>
                <td><?php echo $bebida['ingredientes']; ?></td>
                <td><?php echo $bebida['instrucoes']; ?></td>
                

                <td>
                    <a href="/SubZero/public/update-bebida/<?php echo $bebida['id_bebida']; ?>">Atualizar</a>

                    <form action="/SubZero/public/delete-bebida" method="POST" style="display:inline;">

                        <input type="hidden" name="nome" value="<?php echo $bebida['nome']; ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <a href="/SubZero/public/bebida/">Cadastrar nova bebida</a>


</body>
</html>