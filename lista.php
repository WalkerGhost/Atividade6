<?php

require_once(__DIR__ . "/conecta.php");

echo "<h1>Diagnóstico do Banco de Dados</h1>";

// Verifica qual banco está conectado
$banco = $conexao->query("SELECT DATABASE()");

$nomeBanco = $banco->fetch_row();

echo "<p>Banco conectado: " . $nomeBanco[0] . "</p>";

// Conta os alunos cadastrados
$sql = "SELECT COUNT(*) AS total FROM aluno";

$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro: " . $conexao->error);
}

$dados = $resultado->fetch_assoc();

echo "<h2>Total de alunos: " . $dados['total'] . "</h2>";

// Lista os alunos
$sql = "SELECT * FROM aluno";

$resultado = $conexao->query($sql);

echo "<h2>Alunos encontrados:</h2>";

while ($linha = $resultado->fetch_assoc()) {

    echo "<p>";
    echo "ID: " . htmlspecialchars($linha['id']) . "<br>";
    echo "Nome: " . htmlspecialchars($linha['nome']) . "<br>";
    echo "CPF: " . htmlspecialchars($linha['cpf']);
    echo "</p>";

}

$conexao->close();

?>
