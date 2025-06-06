<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Bar</title>
</head>
<body>

    <h1>Cadastro de Bar</h1>
    
    <form action="/SubZero/public/save-bar" method="POST">
        <label for="nome_completo">Nome:</label>
        <input type="text" id="nome_completo" name="nome_completo" required><br><br>

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" required><br><br>

        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Cadastrar Bar">
    </form>

    <a href="/SubZero/public/list-bar"><h4>Ver todos os bares</h4></a>
    <a href="/SubZero/public/bar/">Cadastrar bar</a>

    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const cep = document.getElementById('cep').value;
        const numero = document.getElementById('numero').value;
        const endereco = `${cep}, ${numero}, Brasil`;

        e.preventDefault(); // Impede o envio imediato

        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(endereco)}`)
          .then(res => res.json())
          .then(data => {
            if (data.length) {
              // Cria campos ocultos para latitude e longitude
              let latInput = document.getElementById('latitude');
              let lonInput = document.getElementById('longitude');
              if (!latInput) {
                latInput = document.createElement('input');
                latInput.type = 'hidden';
                latInput.name = 'latitude';
                latInput.id = 'latitude';
                this.appendChild(latInput);
              }
              if (!lonInput) {
                lonInput = document.createElement('input');
                lonInput.type = 'hidden';
                lonInput.name = 'longitude';
                lonInput.id = 'longitude';
                this.appendChild(lonInput);
              }
              latInput.value = data[0].lat;
              lonInput.value = data[0].lon;
              this.submit(); // Agora envia o formulário
            } else {
              alert('Endereço não encontrado! Verifique o CEP e número.');
            }
          })
          .catch(() => alert('Erro ao buscar coordenadas!'));
    });
    </script>
</body>
</html>