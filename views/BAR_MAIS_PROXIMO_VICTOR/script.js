let bares = []; // variável global para guardar os bares
let marcadores = []; // para controlar os marcadores no mapa

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
    // Limpa marcadores antigos
    marcadores.forEach(m => map.removeLayer(m));
    marcadores = [];
    bares.forEach(bar => {
      if (bar.latitude && bar.longitude) {
        const lat = parseFloat(bar.latitude);
        const lon = parseFloat(bar.longitude);
        const marker = L.marker([lat, lon]).addTo(map);
        marker.bindPopup(`<strong>${bar.nome}</strong><br>Email: ${bar.email}<br>Cidade: ${bar.cidade}<br>Estado: ${bar.estado}`);
        marcadores.push(marker);
      }
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
    // Limpa marcadores antigos
    marcadores.forEach(m => map.removeLayer(m));
    marcadores = [];
    if (barEncontrado.latitude && barEncontrado.longitude) {
      const lat = parseFloat(barEncontrado.latitude);
      const lon = parseFloat(barEncontrado.longitude);
      map.setView([lat, lon], 17);
      const marker = L.marker([lat, lon]).addTo(map);
      marcadores.push(marker);
      let popupMsg = `<strong>${barEncontrado.nome}</strong><br>Email: ${barEncontrado.email}<br>Cidade: ${barEncontrado.cidade}<br>Estado: ${barEncontrado.estado}`;
      marker.bindPopup(popupMsg).openPopup();
    } else {
      alert("Bar encontrado, mas latitude/longitude não cadastradas.");
    }
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

function extrairEnderecoParaBusca(endereco, retornarCidade) {
  // Exemplo de entrada: "Av. Dom Pedro II, 975 - Centro, Salto - SP, 13320241"
  // Saída desejada: "Avenida Dom Pedro II, 975, Salto, SP, Brasil"
  if (!endereco) return retornarCidade ? { enderecoBusca: '', cidadeForcada: '' } : '';
  endereco = normalizarEndereco(endereco);
  // Remove CEP (números no final, com ou sem hífen)
  endereco = endereco.replace(/,?\s*\d{5}-?\d{3}$/g, '');
  // Remove bairro (padrão: " - Bairro,")
  endereco = endereco.replace(/ - [^,]+,/, ',');
  // Remove bairro se estiver entre vírgulas (ex: ", Centro,")
  endereco = endereco.replace(/,\s*[^,]+,/, ',');
  // Normaliza separador de estado (" - SP" para ", SP")
  endereco = endereco.replace(/ - ([A-Z]{2})/, ', $1');
  // Remove vírgulas duplicadas e espaços extras
  endereco = endereco.replace(/\s+,/g, ',').replace(/,\s+/g, ', ').replace(/,+/g, ',').replace(/\s{2,}/g, ' ');
  // Remove vírgula no final
  endereco = endereco.replace(/,$/, '');
  // Divide por vírgula e pega os elementos
  let partes = endereco.split(',').map(e => e.trim()).filter(Boolean);
  // Garante que tenha pelo menos rua, número, cidade, estado
  let rua = partes[0] || '';
  let numero = partes[1] || '';
  let cidade = '';
  let estado = '';
  // Procura cidade e estado nas últimas partes
  for (let i = partes.length - 1; i >= 0; i--) {
    let match = partes[i].match(/^([A-Za-zÀ-ÿ\s]+)\s*([A-Z]{2})$/);
    if (match) {
      cidade = match[1].trim();
      estado = match[2].trim();
      break;
    }
    // Alternativa: "Cidade - SP"
    match = partes[i].match(/^([A-Za-zÀ-ÿ\s]+)-\s*([A-Z]{2})$/);
    if (match) {
      cidade = match[1].trim();
      estado = match[2].trim();
      break;
    }
  }
  // Se não encontrou, tenta pegar das últimas partes
  if (!cidade && partes.length > 2) cidade = partes[partes.length - 2];
  if (!estado && partes.length > 1) {
    let est = partes[partes.length - 1].match(/[A-Z]{2}/);
    if (est) estado = est[0];
  }
  // Força cidade para Salto, Itu ou Indaiatuba se aparecer no endereço
  let cidadesPermitidas = ['Salto', 'Itu', 'Indaiatuba'];
  let cidadeForcada = cidadesPermitidas.find(c => endereco.toLowerCase().includes(c.toLowerCase()));
  if (cidadeForcada) {
    cidade = cidadeForcada;
  }
  // Monta endereço final para busca
  let enderecoBusca = `${rua}, ${numero}, ${cidade}, ${estado}, Brasil`;
  enderecoBusca = enderecoBusca.replace(/\s+/g, ' ').replace(/ ,/g, ',').trim();
  if (retornarCidade) {
    return { enderecoBusca, cidadeForcada };
  } else {
    return enderecoBusca;
  }
}
