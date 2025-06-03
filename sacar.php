<?php
session_start();

// Configuração do banco de dados - ajuste conforme seu ambiente
$host = 'www.thyagoquintas.com.br';
$usuario = 'engenharia_50';
$senha = 'tucano';
$banco = 'engenharia_50';

// Cria conexão
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica conexão
if ($conexao->connect_error) {
    die("Erro na conexão com banco: " . $conexao->connect_error);
}

$valor = floatval($_GET['valor'] ?? 0);

$id_usuario = 1;

// Buscar pontos atuais
$sql = "SELECT balance FROM CarbonTracker WHERE id = $id_usuario";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
$pontos_atuais = floatval($row['balance']);

// Verificar e subtrair
if ($valor <= ($pontos_atuais / 10)) {
  $novo_pontos = $pontos_atuais - ($valor * 10);
  $update = "UPDATE CarbonTracker SET balance = $novo_pontos WHERE id = $id_usuario";
  mysqli_query($conexao, $update);
  header("Location: saque.php?sucesso=1");
} else {
  header("Location: saque.php?erro=1");
}
?>
