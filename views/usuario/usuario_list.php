<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Usuários Cadastrados</title> 

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                        url('https://img.cdndsgni.com/preview/11131636.jpg') 
                        center/cover no-repeat fixed;
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #fff;
            font-size: 2.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 40px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
            animation: fadeInUp 0.4s ease;
        }

        table {
            width: 95%;
            max-width: 1100px;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            animation: fadeInUp 0.6s ease;
        }

        th, td {
            padding: 18px;
            text-align: left;
            color: #fff;
            font-size: 1rem;
        }

        th {
            text-transform: uppercase;
            font-weight: 700;
            background: rgba(0, 0, 0, 0.35);
            letter-spacing: 1px;
        }

        tr {
            transition: background 0.3s ease;
        }

        tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.05);
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.10);
        }

        /* Botões */
        a, button {
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        a {
            background: #0072ff;
            display: inline-block;
        }

        a:hover {
            background: #005ad1;
            transform: translateY(-2px);
        }

        button {
            background: #ff2727;
        }

        button:hover {
            background: #cc1818;
            transform: translateY(-2px);
        }

        /* Link Cadastrar Novo */
        .novoUsuario {
            margin-top: 30px;
            padding: 14px 35px;
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            font-size: 1rem;
            animation: fadeInUp 0.8s ease;
        }

        .novoUsuario:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
        }

        /* Animação */
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

        @media(max-width: 700px) {
            th, td {
                font-size: 0.85rem;
                padding: 12px;
            }
        }
    </style>
</head>

<body>

    <h1>Usuários Cadastrados</h1>

    <table>
        <tr>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Senha</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario['nome_completo']; ?></td>
            <td><?php echo $usuario['cpf']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo $usuario['senha']; ?></td>

            <td style="display:flex; gap:10px;">
                <a href="/SubZero/public/update-usuario/<?php echo $usuario['id']; ?>">Atualizar</a>

                <form method="POST" action="/SubZero/public/delete-usuario">
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a class="novoUsuario" href="/SubZero/public/usuario/">Cadastrar novo Usuário</a>

</body>
</html>
