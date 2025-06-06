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

        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude" value="<?= htmlspecialchars($barInfo['latitude'] ?? '') ?>" required><br><br>

        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude" value="<?= htmlspecialchars($barInfo['longitude'] ?? '') ?>" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" value="<?= htmlspecialchars($barInfo['senha']) ?>" required><br><br>

        <input type="submit" value="Atualizar Bar">
    </form>

    <a href="/SubZero/public/list-bar">Voltar para a lista</a>

    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const cep = document.getElementById('cep').value;
        const numero = document.getElementById('numero').value;
        const latitude = document.getElementById('latitude');
        const longitude = document.getElementById('longitude');
        const endereco = `${cep}, ${numero}, Brasil`;

        // Só busca novas coordenadas se o usuário alterou CEP ou número
        if (cep && numero && (latitude.value === '' || longitude.value === '')) {
            e.preventDefault();

            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(endereco)}`)
              .then(res => res.json())
              .then(data => {
                if (data.length) {
                  latitude.value = data[0].lat;
                  longitude.value = data[0].lon;
                  this.submit();
                } else {
                  alert('Endereço não encontrado! Verifique o CEP e número.');
                }
              })
              .catch(() => alert('Erro ao buscar coordenadas!'));
        }
    });
    </script>

</body>
</html>
