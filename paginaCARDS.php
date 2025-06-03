<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Página Estilosa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");

    body {
      font-family: "Inter", sans-serif;
      background: linear-gradient(to bottom, #F0FFF5 0%, #C7EFCF 100%);
    }

    .selected {
      border: 2px solid #008A2E;
      box-shadow: 0 0 12px rgba(0, 138, 46, 0.7);
      transition: all 0.3s ease-in-out;
    }
  </style>
</head>
<body class="min-h-screen">

  <div class="max-w-md mx-auto">

    <!-- Header -->
    <header class="bg-[#D9F0D9] px-4 py-3 flex items-center gap-2 sticky top-0 z-30 shadow-md rounded-b-lg">
      <a href="inicio.php" class="flex items-center gap-2 text-[#0B6E2E] text-sm font-medium select-none">
        <i class="fas fa-chevron-left text-base"></i>
        <span>Voltar</span>
      </a>
    </header>

    <!-- Timeline -->
    <section class="px-4 pt-6 pb-3">
      <div class="flex items-center gap-3">
        <div class="flex flex-col items-center">
          <div class="w-5 h-5 rounded-full bg-[#0B6E2E]"></div>
          <div class="w-[1px] h-10 border-l-2 border-dashed border-[#0B6E2E]/50"></div>
        </div>
        <div class="flex flex-col text-[#0B6E2E] text-xs font-medium leading-4 select-none">
          <span>Saída</span>
          <span class="border-b border-[#0B6E2E] w-24 pt-1">Sua Localização</span>
        </div>
      </div>
      <div class="flex items-center gap-3 mt-4">
        <div class="flex flex-col items-center">
          <div class="w-5 h-5 rounded-full bg-[#C4C4C4]"></div>
        </div>
        <div class="flex flex-col text-[#0B6E2E] text-xs font-medium leading-4 select-none">
          <span>Para</span>
          <span class="pt-1">Destino final</span>
        </div>
      </div>

      <!-- Botão Escolher -->
      <div class="flex justify-center mt-6">
        <button
          id="choose-btn-top"
          class="bg-[#008A2E] text-white text-sm font-semibold py-2 px-8 rounded-full shadow hover:bg-[#006622] transition duration-300"
          type="button"
        >
          Escolher
        </button>
      </div>
    </section>

    <!-- Cards -->
    <section id="cards-container" class="px-4 flex flex-col gap-5 mt-5 mb-10">
      <!-- JS coloca os cards aqui -->
    </section>

  </div>

  <script>
    const cardsData = [
      { tempo: 20, pontos: "2Cab", icon: "https://storage.googleapis.com/a1aa/image/fe4d156f-20b9-483b-1491-bfbd64540248.jpg", alt: "Carro" },
      { tempo: 10, pontos: "5Cab", icon: "https://storage.googleapis.com/a1aa/image/2df096a2-da81-45c4-9682-e60c2e6740db.jpg", alt: "Moto" },
      { tempo: 15, pontos: "3Cab", icon: "https://storage.googleapis.com/a1aa/image/fe4d156f-20b9-483b-1491-bfbd64540248.jpg", alt: "Carro" },
      { tempo: 8, pontos: "4Cab", icon: "https://storage.googleapis.com/a1aa/image/2df096a2-da81-45c4-9682-e60c2e6740db.jpg", alt: "Moto" },
      { tempo: 25, pontos: "6Cab", icon: "https://storage.googleapis.com/a1aa/image/fe4d156f-20b9-483b-1491-bfbd64540248.jpg", alt: "Carro" },
      { tempo: 12, pontos: "7Cab", icon: "https://storage.googleapis.com/a1aa/image/2df096a2-da81-45c4-9682-e60c2e6740db.jpg", alt: "Moto" },
    ];

    const container = document.getElementById("cards-container");

    function createCard({ tempo, pontos, icon, alt }) {
      const card = document.createElement("div");
      card.className = "bg-[#D9F0D9] rounded-xl relative p-4 cursor-pointer shadow-md transition hover:shadow-lg";

      card.innerHTML = `
        <div class="flex justify-between items-center mb-2 select-none">
          <span class="text-[#0B6E2E] text-sm font-normal">Tempo de Viagem</span>
          <img src="${icon}" alt="${alt}" class="w-10 h-7 object-contain" loading="lazy" />
        </div>
        <div class="flex items-center gap-2 mb-2 select-none">
          <span class="text-[#0B6E2E] text-3xl font-bold">${tempo}</span>
          <span class="text-[#0B6E2E] text-lg font-medium">min</span>
        </div>
        <div class="border-t border-dashed border-white/70 pt-2 select-none flex justify-between text-[#0B6E2E] text-xs font-normal">
          <span>pontos da viagem :</span>
          <span class="font-bold">${pontos}</span>
        </div>
        <div class="absolute top-1/2 -left-3 w-6 h-6 bg-white rounded-r-full"></div>
        <div class="absolute top-1/2 -right-3 w-6 h-6 bg-white rounded-l-full"></div>
      `;

      card.addEventListener("click", () => {
        document.querySelectorAll("#cards-container > div").forEach(c => c.classList.remove("selected"));
        card.classList.add("selected");
        document.getElementById("choose-btn-top").scrollIntoView({ behavior: "smooth", block: "center" });
      });

      return card;
    }

    function loadCards() {
      cardsData.forEach(cardData => {
        container.appendChild(createCard(cardData));
      });
    }

    loadCards();

    document.getElementById("choose-btn-top").addEventListener("click", () => {
      window.location.href = "mapateste.php";
    });
  </script>

</body>
</html>

