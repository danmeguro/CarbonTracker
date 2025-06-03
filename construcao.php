<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Página em Construção</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");
    body {
      font-family: "Inter", sans-serif;
      background: linear-gradient(to top, #F6FFF9 0%, #B2D8A7 60%, #8BB285 100%);
      overflow-x: hidden;
    }

    /* Nuvens com círculos responsivos */
    .nuvem {
      position: absolute;
      background-color: #A9C9A1;
      border-radius: 50%;
      opacity: 0.7;
    }

    .nuvem-1 {
      width: 25vw;
      max-width: 140px;
      height: 25vw;
      max-height: 140px;
      top: 2rem;
      left: 1rem;
    }
    .nuvem-1::before,
    .nuvem-1::after {
      content: "";
      position: absolute;
      background-color: #A9C9A1;
      border-radius: 50%;
    }
    .nuvem-1::before {
      width: 22vw;
      max-width: 120px;
      height: 22vw;
      max-height: 120px;
      top: -15%;
      left: 40%;
    }
    .nuvem-1::after {
      width: 18vw;
      max-width: 90px;
      height: 18vw;
      max-height: 90px;
      top: 20%;
      left: 60%;
    }

    .nuvem-2 {
      width: 20vw;
      max-width: 120px;
      height: 20vw;
      max-height: 120px;
      bottom: 3rem;
      right: 1.5rem;
    }
    .nuvem-2::before,
    .nuvem-2::after {
      content: "";
      position: absolute;
      background-color: #A9C9A1;
      border-radius: 50%;
    }
    .nuvem-2::before {
      width: 17vw;
      max-width: 90px;
      height: 17vw;
      max-height: 90px;
      top: -15%;
      left: 30%;
    }
    .nuvem-2::after {
      width: 13vw;
      max-width: 60px;
      height: 13vw;
      max-height: 60px;
      top: 10%;
      left: 60%;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen relative px-4">

  <!-- Nuvens decorativas -->
  <div class="nuvem nuvem-1"></div>
  <div class="nuvem nuvem-2"></div>

  <!-- Conteúdo principal -->
  <div class="bg-white shadow-xl rounded-xl p-6 text-center max-w-md z-10 w-full sm:w-auto">
    <h1 class="text-2xl font-bold text-[#2B5B4B] mb-2">Em Construção</h1>
    <p class="text-[#2B5B4B] mb-4 text-sm sm:text-base">
      Esta página está sendo preparada com carinho 💚<br />
      Em breve você poderá acessar todo o conteúdo por aqui.
    </p>
    <div class="mt-6">
      <a href="inicio.php"
         class="inline-block px-6 py-2 rounded-full text-sm font-semibold text-white bg-[#2B5B4B] hover:bg-[#1f4236] transition duration-300">
         Voltar à página inicial
      </a>
    </div>
  </div>

</body>
</html>
