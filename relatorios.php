<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Documentos PDF Disponíveis</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");
    body {
      font-family: "Inter", sans-serif;
      background: linear-gradient(to top, #f0fff4 0%, #ffffff 100%);
      overflow-x: hidden;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 1rem;
      position: relative;
    }

    /* Nuvens com círculos responsivos */
    .nuvem {
      position: absolute;
      background-color: #e0f7e9;
      border-radius: 50%;
      filter: drop-shadow(0 2px 3px rgba(0, 138, 46, 0.15));
      opacity: 0.85;
      animation: flutuar 10s ease-in-out infinite alternate;
    }

    @keyframes flutuar {
      0% { transform: translateY(0); }
      100% { transform: translateY(10px); }
    }

    .nuvem-1 {
      width: 25vw;
      max-width: 140px;
      height: 25vw;
      max-height: 140px;
      top: 2rem;
      left: 1rem;
      z-index: 0;
    }
    .nuvem-1::before,
    .nuvem-1::after {
      content: "";
      position: absolute;
      background-color: #e0f7e9;
      border-radius: 50%;
      filter: drop-shadow(0 2px 3px rgba(0, 138, 46, 0.15));
      opacity: 0.85;
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
      z-index: 0;
      animation-delay: 5s;
    }
    .nuvem-2::before,
    .nuvem-2::after {
      content: "";
      position: absolute;
      background-color: #e0f7e9;
      border-radius: 50%;
      filter: drop-shadow(0 2px 3px rgba(0, 138, 46, 0.15));
      opacity: 0.85;
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

    /* Card principal */
    .card {
      background: white;
      border-radius: 1rem;
      padding: 2rem 1.5rem;
      max-width: 420px;
      width: 100%;
      box-shadow: 0 10px 25px rgba(0, 138, 46, 0.1);
      text-align: center;
      z-index: 10;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .card h1 {
      color: #008A2E;
      font-weight: 700;
      font-size: 2.25rem;
      margin-bottom: 0.25rem;
      line-height: 1.2;
    }

    .card p {
      color: #4a4a4a;
      font-weight: 400;
      font-size: 1rem;
      line-height: 1.5;
      margin-bottom: 1.5rem;
    }

    .btn {
      display: inline-block;
      padding: 0.6rem 2.5rem;
      font-size: 1rem;
      font-weight: 700;
      color: white;
      background-color: #008A2E;
      border-radius: 9999px;
      text-decoration: none;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 138, 46, 0.3);
      user-select: none;
      margin-top: 1rem;
    }
    .btn:hover,
    .btn:focus {
      background-color: #007629;
      outline: none;
      box-shadow: 0 0 10px #007629aa;
    }

    /* Lista PDF */
    .lista-pdf {
      text-align: left;
      max-height: 250px;
      overflow-y: auto;
      border: 1px solid #008A2E44;
      border-radius: 0.75rem;
      padding: 0.75rem 1rem;
      background: #f9fefb;
      box-shadow: inset 0 0 8px #008A2E22;
    }
    .lista-pdf a {
      display: block;
      padding: 0.4rem 0;
      color: #006622;
      font-weight: 600;
      text-decoration: none;
      border-bottom: 1px solid #008A2E22;
      transition: color 0.3s ease;
    }
    .lista-pdf a:last-child {
      border-bottom: none;
    }
    .lista-pdf a:hover,
    .lista-pdf a:focus {
      color: #004411;
      text-decoration: underline;
      outline: none;
    }

    @media (max-width: 480px) {
      .card {
        padding: 1.5rem 1rem;
        max-width: 100%;
      }
      .card h1 {
        font-size: 1.8rem;
      }
      .btn {
        padding: 0.5rem 2rem;
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>

  <!-- Nuvens decorativas -->
  <div class="nuvem nuvem-1"></div>
  <div class="nuvem nuvem-2"></div>

  <!-- Card principal -->
  <main class="card" role="main" aria-labelledby="titulo-principal">
    <h1 id="titulo-principal">Documentos Disponíveis</h1>
    <p>
      Aqui estão os arquivos PDF que você pode acessar. Clique no nome do documento para abrir ou baixar.
    </p>

    <div class="lista-pdf" tabindex="0" aria-label="Lista de documentos PDF">
      <a href="docs/documento1.pdf" target="_blank" rel="noopener noreferrer" aria-label="Abrir Documento 1">📄 Documento 1 - Manual de Uso</a>
      <a href="docs/documento2.pdf" target="_blank" rel="noopener noreferrer" aria-label="Abrir Documento 2">📄 Documento 2 - Termos e Condições</a>
      <a href="docs/documento3.pdf" target="_blank" rel="noopener noreferrer" aria-label="Abrir Documento 3">📄 Documento 3 - Relatório Anual</a>
      <a href="docs/documento4.pdf" target="_blank" rel="noopener noreferrer" aria-label="Abrir Documento 4">📄 Documento 4 - Guia Rápido</a>
      <a href="docs/documento5.pdf" target="_blank" rel="noopener noreferrer" aria-label="Abrir Documento 5">📄 Documento 5 - Política de Privacidade</a>
    </div>

    <a href="inicio.php" class="btn" role="button" aria-label="Voltar à página inicial">
      Voltar à página inicial
    </a>
  </main>

</body>
</html>
