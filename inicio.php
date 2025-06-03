<?php
$host = 'www.thyagoquintas.com.br'; // ou 127.0.0.1
$db = 'engenharia_50';
$user = 'engenharia_50';
$pass = 'tucano';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    // Suponha que você tenha uma tabela chamada 'usuarios' com a coluna 'balance'
    // Aqui vamos pegar o balance do usuário com ID 1, por exemplo
    $stmt = $pdo->prepare("SELECT balance FROM CarbonTracker WHERE id = 1");
    $stmt->execute();
    $balance = $stmt->fetchColumn();

    if ($balance !== false) {
        $credit = $balance / 10;
    } else {
        $credit = 0;
    }
} catch (\PDOException $e) {
    echo "Erro na conexão com o banco: " . $e->getMessage();
    $credit = 0;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Painel Principal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    crossorigin="anonymous"
  />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to bottom, #F6FFF9 0%, #B2D8A7 60%, #8BB285 100%);
    }

    #sidebar {
      transition: transform 0.3s ease;
      border-top-right-radius: 1rem;
      border-bottom-right-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      background-color: #CDE6CA; /* Verde bem clarinho e suave */
      color: #356B3B; /* Verde mais suave e menos forte */
    }

    #sidebar a {
      transition: background-color 0.3s ease, color 0.3s ease;
      color: #356B3B;
    }
    #sidebar a:hover {
      background-color: #A9C9A1; /* Verde médio suave */
      color: #1F4D2E;
    }

    #closeSidebar {
      color: #356B3B;
      transition: color 0.3s ease;
    }
    #closeSidebar:hover {
      color: #1F4D2E;
    }

    /* Botão hamburguer mais suave */
    #menuToggle {
      color: #356B3B;
      transition: color 0.3s ease;
    }
    #menuToggle:hover {
      color: #1F4D2E;
    }

    /* Texto Menu */
    #sidebar > div > span {
      font-weight: 700;
      font-size: 1.125rem;
      color: #2B5B4B;
    }
  </style>
</head>
<body class="min-h-screen flex">

  <!-- Menu lateral -->
  <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 transform -translate-x-full z-50 shadow-lg">
    <div class="flex items-center justify-between p-4 mb-4">
      <span>Menu</span>
      <button id="closeSidebar" class="text-xl focus:outline-none" aria-label="Fechar menu">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <nav class="flex flex-col px-4 gap-4">
      <a href="#" class="rounded px-3 py-2 hover:cursor-pointer">🏠 Início</a>
      <a href="relatorios.php" class="rounded px-3 py-2 hover:cursor-pointer">📄 Relatórios</a>
      <a href="construcao.php" class="rounded px-3 py-2 hover:cursor-pointer">⚙️ Configurações</a>
      <a href="construcao.php" class="rounded px-3 py-2 hover:cursor-pointer">❓ Ajuda</a>
    </nav>
  </aside>

  <!-- Conteúdo geral -->
  <div class="flex-1 flex flex-col w-full">

    <!-- Barra superior -->
    <header class="fixed top-0 left-0 w-full bg-[#A9C9A1] shadow-md z-40 px-4 py-3 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <button id="menuToggle" class="text-lg focus:outline-none" aria-label="Abrir menu">
          <i class="fas fa-bars"></i>
        </button>
        <h1 class="text-[#2B5B4B] text-xl font-bold select-none">Painel Principal</h1>
      </div>
      <button
        onclick="window.location.href='index.php'"
        class="bg-transparent border-2 border-[#2B5B4B] text-[#2B5B4B] font-semibold px-4 py-1 rounded-full hover:bg-[#2B5B4B] hover:text-white transition"
      >
        Sair
      </button>
    </header>

    <!-- Conteúdo principal -->
    <main class="flex flex-col items-center justify-center flex-grow px-4 pt-24 text-center">
      <div class="text-[#2B5B4B] max-w-md w-full">
        <div class="mb-4">
          <a href="saque.php" aria-label="Ir para saque">
            <img
              src="https://storage.googleapis.com/a1aa/image/ea504d95-f485-40a7-510c-56a43bc868b6.jpg"
              alt="Logo"
              class="mx-auto w-24 h-24 rounded-full object-cover hover:scale-110 transition-transform"
            />
          </a>
        </div>
        <div class="text-lg font-semibold bg-[#d9f0df] rounded-full py-2 mb-4">
          C$: <?php echo number_format($credit, 2, ',', '.'); ?>
        </div>
        <div class="bg-[#d9f0df] rounded-lg p-4 text-left">
          <h2 class="text-lg font-bold mb-2">Histórico</h2>
          <p class="text-sm mb-1">Av. Eng. Eusébio Stevaux, 823 - Santo Amaro, São Paulo - SP, 04696-000</p>
          <p class="text-sm">Casa</p>
        </div>
        <div class="mt-6">
          <a href="paginaCARDS.php" aria-label="Ir para cards">
            <img
              src="https://storage.googleapis.com/a1aa/image/1d76b352-0c9c-4e5c-b9c2-6feb6d1c667d.jpg"
              alt="Ícone de Reciclagem"
              class="mx-auto w-16 h-16 rounded-full border-2 border-white object-cover hover:scale-110 transition-transform"
            />
          </a>
        </div>
      </div>
    </main>
  </div>

  <!-- Script do menu -->
  <script>
    const menuToggle = document.getElementById("menuToggle");
    const sidebar = document.getElementById("sidebar");
    const closeSidebar = document.getElementById("closeSidebar");

    menuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("-translate-x-full");
    });

    closeSidebar.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
    });
  </script>

</body>
</html>
