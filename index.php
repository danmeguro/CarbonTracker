<?php
// Configurações do banco
$servername = "www.thyagoquintas.com.br";  // ou IP do servidor DB
$username = "engenharia_50";
$password = "tucano";
$dbname = "engenharia_50";
// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
    }

    // Processa o login ao submeter o formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $conn->real_escape_string($_POST['email'] ?? '');
        $pass = $_POST['senha'] ?? '';

        // Consulta o usuário no banco pelo campo user
        $sql = "SELECT * FROM CarbonTracker WHERE email = '$email' LIMIT 1";
        $result = $conn->query($sql);

        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verifica senha
            // Se sua senha está salva sem hash (não recomendado), compara direto:
            // if ($pass === $row['pass']) { ... }

            // Se a senha estiver salva com hash (melhor):
          if ($pass === $row['pass']) {
              // Login OK, redireciona para inicio.php
                header("Location: inicio.php");
                exit;
            } else {
                $erro = "Senha incorreta.";
            }
        } else {
            $erro = "Usuário não encontrado.";
        }
    }

    $conn->close();
    ?>
    
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-[#d9f0db] min-h-screen flex items-start justify-center p-6">
  <main class="w-full max-w-xs bg-[#d9f0db] rounded-md pt-6 pb-10 px-6">
    <section class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-extrabold text-[#0f9d58] leading-none">Bem Vindo!</h1>
      <img alt="Logo do Carbon Tracker com ícone de pessoa correndo e elementos verdes e azuis" class="w-12 h-12 object-contain" height="48" src="https://storage.googleapis.com/a1aa/image/e9e6e60b-2908-4979-cb10-6e913187a5d0.jpg" width="48"/>
    </section>
    <form class="flex flex-col gap-4" method="post" action="">
      <input class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-gray-600 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#0f9d58]" placeholder="Email" type="email" name="email"/>
      <input class="w-full rounded-md border border-gray-300 bg-white px-4 py-3 text-gray-600 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#0f9d58]" placeholder="Senha" type="password" name="senha"/>
      <div class="text-right text-xs text-gray-800">Esqueceu a senha?</div>
      <div class="text-center text-sm text-gray-900 mt-4 mb-6">
        Ainda não tem uma conta?
        <a class="text-blue-600" href="#">Cadastre-se!</a>
      </div>
      <button class="w-full bg-[#0f9d58] text-white font-semibold rounded-lg py-3 hover:bg-[#0c7a43] transition-colors" type="submit">Entrar</button>
    </form>
    <button class="w-full mt-6 border border-white bg-[#f0f5f0] text-gray-900 font-semibold rounded-lg py-3 hover:bg-[#e1e9e1] transition-colors" type="button">
      Continuar com o Google
    </button>
    <button class="w-full mt-4 border border-white bg-[#f0f5f0] text-gray-900 font-semibold rounded-lg py-3 hover:bg-[#e1e9e1] transition-colors" type="button">
      Continuar com o Facebook
    </button>
  </main>
</body>
</html>

