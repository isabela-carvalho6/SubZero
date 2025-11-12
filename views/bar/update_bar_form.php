<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Bar</title>
</head>
<body>

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
