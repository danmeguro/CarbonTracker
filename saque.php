<?php
// Conexão com o banco (exemplo com MySQLi)
$conn = new mysqli("www.thyagoquintas.com.br", "engenharia_50", "tucano", "engenharia_50");
if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}

// Supondo que o ID do usuário seja conhecido (ex: 1)
$usuario_id = 1;

// Consulta para obter o valor em pontos
$sql = "SELECT balance FROM CarbonTracker WHERE id = $usuario_id";
$result = $conn->query($sql);
$pontos = 0.0;

if ($result && $row = $result->fetch_assoc()) {
  $pontos = $row['balance'];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Saque</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
    .active-tab::after {
      content: '';
      position: absolute;
      bottom: -4px;
      left: 0;
      width: 100%;
      height: 2px;
      background-color: #15803d;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-[#d9f0db] to-[#f0fdf4] min-h-screen flex items-start justify-center p-4">
  <main class="w-full max-w-sm">
    <!-- Cabeçalho com botão de voltar -->
    <header class="bg-[#e8f5e9] text-[#15803d] px-5 py-4 rounded-xl mb-4 flex items-center gap-2 shadow-md shadow-green-100">
      <a href="inicio.php" class="flex items-center font-semibold text-[#15803d] hover:underline hover:text-[#10692d] transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L4.414 9H18a1 1 0 110 2H4.414l3.293 3.293a1 1 0 010 1.414z" clip-rule="evenodd" />
        </svg>
        Voltar
      </a>
    </header>

    <!-- Cartões de saldo -->
    <section class="bg-transparent rounded-2xl overflow-hidden">
      <div class="flex items-center justify-between bg-white/60 backdrop-blur-md rounded-xl px-5 py-4 mb-4 shadow-lg">
        <div>
          <label class="text-gray-600 text-sm">Seu Saldo:</label>
          <p class="text-lg font-bold border-b border-gray-300 pb-1">R$ <?= number_format($pontos / 10, 2, ',', '.') ?></p>
          <label class="text-gray-600 text-sm mt-2 block">Pontos:</label>
          <p class="text-gray-700">C$ <?= number_format($pontos, 2, ',', '.') ?></p>
        </div>
        <div class="w-14 h-14 bg-gradient-to-tr from-green-400 to-green-200 rounded-full flex items-center justify-center overflow-hidden">
          <img src="https://via.placeholder.com/60x60?text=C" alt="Moeda" class="object-cover w-full h-full" />
        </div>
      </div>

      <!-- Caixa de saque -->
      <div class="bg-white/60 backdrop-blur-md rounded-xl px-6 py-6 shadow-lg">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Sacar Dinheiro</h2>

        <!-- Abas -->
        <div class="flex justify-center gap-4 text-sm text-gray-500 border-b pb-2 mb-5 relative">
          <button id="tabTransferencias" class="relative px-3 py-1 font-semibold text-[#15803d] active-tab transition-all">Transferências Bancárias</button>
          <button id="tabPix" class="relative px-3 py-1 font-semibold hover:text-[#15803d] transition-all">Pix</button>
        </div>

        <!-- Valores -->
        <div class="grid grid-cols-2 gap-4 mb-6">
          <button class="btn-saque bg-gray-100 hover:bg-[#d1fae5] border border-gray-300 rounded-lg py-3 text-gray-700 font-medium transition" data-valor="1.50">R$ 1,50</button>
          <button class="btn-saque bg-gray-100 hover:bg-[#d1fae5] border border-gray-300 rounded-lg py-3 text-gray-700 font-medium transition" data-valor="5.00">R$ 5,00</button>
          <button class="btn-saque bg-gray-100 hover:bg-[#d1fae5] border border-gray-300 rounded-lg py-3 text-gray-700 font-medium transition" data-valor="10.00">R$ 10,00</button>
          <button class="btn-saque bg-gray-100 hover:bg-[#d1fae5] border border-gray-300 rounded-lg py-3 text-gray-700 font-medium transition" data-valor="15.00">R$ 15,00</button>
        </div>

        <!-- Botão de saque -->
        <button id="btnSacar" class="w-full bg-[#15803d] text-white font-bold py-3 rounded-xl shadow-md hover:bg-[#10692d] transition">Sacar</button>
      </div>
    </section>
  </main>

  <script>
    // Tabs
    const tabPix = document.getElementById('tabPix');
    const tabTransf = document.getElementById('tabTransferencias');

    tabPix.addEventListener('click', () => {
      tabPix.classList.add('text-[#15803d]', 'active-tab');
      tabTransf.classList.remove('text-[#15803d]', 'active-tab');
    });

    tabTransf.addEventListener('click', () => {
      tabTransf.classList.add('text-[#15803d]', 'active-tab');
      tabPix.classList.remove('text-[#15803d]', 'active-tab');
    });

    // Navega para página construcao01 ao clicar em sacar
    document.getElementById('btnSacar').addEventListener('click', () => {
      window.location.href = "construcao.php";
    });
  </script>
</body>
</html>
<script>
  document.querySelectorAll('.btn-saque').forEach(btn => {
    btn.addEventListener('click', () => {
      const valor = parseFloat(btn.dataset.valor);
      const pontos = <?= $pontos ?>;

      if (valor <= (pontos / 10)) {
        // Redireciona para um PHP que realiza o saque
        window.location.href = `sacar.php?valor=${valor}`;
      } else {
        alert("Saldo insuficiente para realizar o saque.");
      }
    });
  });
</script>
