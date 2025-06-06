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
        <input type="submit" value="Cadastrar Bar">
    </form>

    <a href="/SubZero/public/list-bar"><h4>Ver todos os bares</h4></a>
    <a href="/SubZero/public/bar/">Cadastrar bar</a>

    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const logradouro = document.getElementById('logradouro').value.trim();
        const numero = document.getElementById('numero').value.trim();
        const bairro = document.getElementById('bairro').value.trim();
        const cidade = document.getElementById('cidade').value.trim();
        const estado = document.getElementById('estado').value.trim();
        const cep = document.getElementById('cep').value.trim();

        // Monta o endereço completo no formato desejado
        const enderecoCompleto = `${logradouro}, ${numero} - ${bairro}, ${cidade} - ${estado}, ${cep}`;

        // Preenche o campo oculto
        document.getElementById('endereco_completo').value = enderecoCompleto;

        e.preventDefault();

        fetch(`https://geocode.xyz/${encodeURIComponent(enderecoCompleto)}?json=1&region=BR`)
          .then(res => res.json())
          .then(data => {
            if (data.latt && data.longt) {
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
              latInput.value = data.latt;
              lonInput.value = data.longt;
              this.submit();
            } else {
              alert('Endereço não encontrado! Verifique o endereço digitado.');
            }
          })
          .catch(() => alert('Erro ao buscar coordenadas!'));
    });
    </script>
</body>
</html>