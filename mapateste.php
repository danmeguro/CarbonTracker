<?php
// pagina_mapa_google.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mapa Google Fixo com Seta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body, html {
      margin: 0; padding: 0; height: 100%;
      font-family: 'Montserrat', sans-serif;
      background-color: #f0f4f8;
    }

    /* Container do mapa fixo no topo */
    #map {
      position: fixed;
      top: 0; left: 0;
      width: 100vw;
      height: 35vh;
      z-index: 0;
    }

    /* Botão voltar fixo sobre o mapa */
    .back-button {
      position: fixed;
      top: 16px;
      left: 16px;
      z-index: 10;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      background-color: rgba(34, 197, 94, 0.85);
      padding: 0.5rem 1rem;
      border-radius: 9999px;
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
      user-select: none;
      box-shadow: 0 2px 6px rgba(0,0,0,0.25);
    }
    .back-button:hover {
      background-color: rgba(34, 197, 94, 1);
    }

    /* Conteúdo abaixo do mapa */
    .content {
      margin-top: 35vh;
      max-width: 430px;
      background: white;
      border-radius: 1rem;
      padding: 1.25rem;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      margin-left: auto;
      margin-right: auto;
      position: relative;
      z-index: 5;
    }

    /* Botão iniciar mais delicado */
    .start-button {
      background-color: rgba(255 255 255 / 0.9);
      color: #16a34a; /* verde-600 */
      font-weight: 700;
      padding: 0.5rem 2.5rem;
      border-radius: 9999px;
      box-shadow: 0 1px 4px rgba(22, 163, 74, 0.6);
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    .start-button:hover {
      background-color: #dcfce7; /* verde-100 */
      color: #15803d; /* verde-700 */
    }
  </style>
</head>
<body>

  <div id="map"></div>

  <button class="back-button" onclick="window.location.href='paginaCARDS.php'">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current" fill="none" viewBox="0 0 24 24" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
    Voltar
  </button>

  <div class="content">
    <section class="bg-green-50 rounded-lg p-4 shadow-inner mb-6">
      <div class="flex justify-between items-center mb-4">
        <div class="flex items-center space-x-2">
          <div class="w-8 h-8 bg-green-600 rounded-full"></div>
          <div>
            <p class="text-green-900 font-semibold">Sua Localização</p>
            <p class="text-green-700 text-sm">Ponto de partida</p>
          </div>
        </div>

        <div class="flex items-center space-x-2">
          <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
          <div>
            <p class="text-gray-700 font-semibold">Destino Final</p>
            <p class="text-gray-500 text-sm">Ponto de chegada</p>
          </div>
        </div>
      </div>

      <div class="border-t border-green-300 pt-3 grid grid-cols-2 gap-4 text-green-900">
        <div>
          <h3 class="font-semibold text-lg">Distância</h3>
          <p class="text-xl">1.50 km</p>
        </div>
        <div>
          <h3 class="font-semibold text-lg">Tempo</h3>
          <p class="text-xl">20 min</p>
        </div>
      </div>
    </section>

    <section class="bg-white rounded-lg p-4 shadow-md mb-6">
      <h2 class="text-gray-900 font-semibold mb-2">Descrição</h2>
      <p class="text-gray-600 text-sm leading-relaxed">
        Distância escolhida para o trajeto de 1.50 km, com um tempo estimado de 20 minutos.
      </p>
    </section>

    <footer class="flex justify-between items-center bg-green-600 rounded-full p-4 shadow-lg text-white font-semibold">
      <div class="text-lg">
        Total de Pontos: <span class="font-extrabold text-2xl">2Cab</span>
      </div>
      <button class="start-button" onclick="window.location.href='construcao.php'">
        Iniciar
      </button>
    </footer>
  </div>

  <!-- Google Maps JS API -->
  <script>
    function initMap() {
      const posicaoInicial = { lat: -23.55052, lng: -46.633308 }; // São Paulo

      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: posicaoInicial,
        disableDefaultUI: true,
        zoomControl: true,
      });

      const marker = new google.maps.Marker({
        position: posicaoInicial,
        map: map,
        title: "Você está aqui",
      });
    }
  </script>
  <script async
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
  </script>

</body>
</html>
