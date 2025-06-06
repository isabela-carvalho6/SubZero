let bares = []; // variável global para guardar os bares

// Inicializa o mapa
const map = L.map('map').setView([-23.55052, -46.633308], 13); // Ponto inicial (São Paulo)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Carrega bares do banco
fetch("get_bares.php")
  .then(res => res.json())
  .then(data => {
    bares = data; // salva bares globalmente
    bares.forEach(bar => {
      const marker = L.marker([bar.latitude, bar.longitude]).addTo(map);
      marker.bindPopup(`<strong>${bar.nome}</strong><br>${bar.endereco}<br>Tipo: ${bar.tipo}`);
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
    map.setView([barEncontrado.latitude, barEncontrado.longitude], 17);
    L.popup()
      .setLatLng([barEncontrado.latitude, barEncontrado.longitude])
      .setContent(`<strong>${barEncontrado.nome}</strong><br>${barEncontrado.endereco}<br>Tipo: ${barEncontrado.tipo}`)
      .openOn(map);
    return;
  }

  // Se não achou bar, busca endereço pelo Nominatim
  fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(termo)}`)
    .then(res => res.json())
    .then(data => {
      if (!data.length) return alert("Local não encontrado.");
      const { lat, lon } = data[0];
      map.setView([lat, lon], 15);
      L.marker([lat, lon]).addTo(map).bindPopup(termo).openPopup();
    })
    .catch(() => alert("Erro ao buscar o local."));
}
