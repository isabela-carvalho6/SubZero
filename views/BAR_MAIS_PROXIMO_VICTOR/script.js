let bares = []; // variável global para guardar os bares

// Inicializa o mapa
const map = L.map('map').setView([-23.55052, -46.633308], 13); // Ponto inicial (São Paulo)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Função para normalizar o endereço
function normalizarEndereco(endereco) {
  return endereco
    .replace(/\bR\.\b/gi, 'Rua')
    .replace(/\bAv\.\b/gi, 'Avenida')
    .replace(/\bRod\.\b/gi, 'Rodovia')
    .replace(/\bDr\.\b/gi, 'Doutor')
    .replace(/\bProf\.\b/gi, 'Professor');
}

// Carrega bares do banco
fetch("get_bares.php")
  .then(res => res.json())
  .then(data => {
    bares = data; // salva bares globalmente
    bares.forEach(bar => {
      const enderecoBusca = extrairEnderecoParaBusca(bar.endereco);
      fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(enderecoBusca)}&countrycodes=BR`)
        .then(res => res.json())
        .then(geoData => {
          if (geoData.length > 0) {
            const lat = parseFloat(geoData[0].lat);
            const lon = parseFloat(geoData[0].lon);
            const marker = L.marker([lat, lon]).addTo(map);
            marker.bindPopup(`<strong>${bar.nome}</strong><br>${bar.endereco}<br>Tipo: ${bar.tipo}`);
          }
        });
    });
  })
  .catch(error => {
    console.error("Erro ao buscar bares:", error);
  });

// Busca por local ou nome de bar
function buscarLocal() {
  const termo = document.getElementById("search").value.trim().toLowerCase();
  if (!termo) return alert("Digite um local ou nome de bar para buscar.");

  // Busca por nome de bar cadastrado
  const barEncontrado = bares.find(bar => bar.nome.toLowerCase().includes(termo));
  if (barEncontrado) {
    const enderecoBusca = extrairEnderecoParaBusca(barEncontrado.endereco);
    fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(enderecoBusca)}&countrycodes=BR`)
      .then(res => res.json())
      .then(geoData => {
        if (geoData.length > 0) {
          const lat = parseFloat(geoData[0].lat);
          const lon = parseFloat(geoData[0].lon);
          map.setView([lat, lon], 17);
          L.popup()
            .setLatLng([lat, lon])
            .setContent(`<strong>${barEncontrado.nome}</strong><br>${barEncontrado.endereco}<br>Tipo: ${barEncontrado.tipo}`)
            .openOn(map);
        } else {
          alert("Endereço do bar não encontrado no mapa.");
        }
      })
      .catch(() => alert("Erro ao buscar o endereço do bar."));
    return;
  }

  // Se não achou bar, busca endereço pelo Nominatim
  fetch(`https://nominatim.openstreetmap.org/search?format=json&countrycodes=BR&q=${encodeURIComponent(termo)}`)
    .then(res => res.json())
    .then(data => {
      if (!data.length) return alert("Local não encontrado.");
      const { lat, lon } = data[0];
      map.setView([lat, lon], 15);
      L.marker([lat, lon]).addTo(map).bindPopup(termo).openPopup();
    })
    .catch(() => alert("Erro ao buscar o local."));
}

// Adicione ao final do seu bar_form.php, antes do </body>
document.querySelector('form').addEventListener('submit', function(e) {
    const logradouro = document.getElementById('logradouro').value.trim();
    const numero = document.getElementById('numero').value.trim();
    const bairro = document.getElementById('bairro').value.trim();
    const cidade = document.getElementById('cidade').value.trim();
    const estado = document.getElementById('estado').value.trim();
    const cep = document.getElementById('cep').value.trim();

    // Monta o endereço completo no formato desejado
    const enderecoCompleto = `${logradouro}, ${numero} - ${bairro}, ${cidade} - ${estado}, ${cep}`;

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

          // Também envie o endereço completo para o backend, se quiser salvar
          let endCompletoInput = document.getElementById('endereco_completo');
          if (!endCompletoInput) {
            endCompletoInput = document.createElement('input');
            endCompletoInput.type = 'hidden';
            endCompletoInput.name = 'endereco_completo';
            endCompletoInput.id = 'endereco_completo';
            this.appendChild(endCompletoInput);
          }
          endCompletoInput.value = enderecoCompleto;

          this.submit();
        } else {
          alert('Endereço não encontrado! Verifique o endereço digitado.');
        }
      })
      .catch(() => alert('Erro ao buscar coordenadas!'));
});

function extrairEnderecoParaBusca(endereco) {
  // Exemplo de entrada: "R. Rui Barbosa, 1043 - Vila Teixeira, Salto - SP, 13328300"
  // Saída desejada: "Rua Rui Barbosa, 1043, Salto, SP"
  endereco = normalizarEndereco(endereco);

  // Remove CEP (tudo após a última vírgula)
  endereco = endereco.replace(/,\s*\d{5}-?\d{3}$/, '');

  // Extrai rua e número (antes do primeiro hífen ou vírgula após número)
  let ruaNumero = endereco.split('-')[0].trim();

  // Extrai cidade e estado (após o último hífen)
  let cidadeEstadoMatch = endereco.match(/,\s*([^,]+)-\s*([A-Z]{2})/);
  let cidade = '';
  let estado = '';
  if (cidadeEstadoMatch) {
    cidade = cidadeEstadoMatch[1].trim();
    estado = cidadeEstadoMatch[2].trim();
  }

  // Monta endereço para busca
  return `${ruaNumero}, ${cidade}, ${estado}`;
}
