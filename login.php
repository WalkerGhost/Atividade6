
<?php

// Incluindo a conexão
include "conecta.php";

// Verificando se os dados foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebendo os dados do formulário
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    // Consulta SQL
    $sql = "SELECT * FROM aluno WHERE cpf = ? AND senha = ?";

    // Preparando a consulta
    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        die("Erro na consulta: " . $conexao->error);
    }

    // Ligando os parâmetros
    $stmt->bind_param("ss", $cpf, $senha);

    // Executando
    $stmt->execute();

    // Obtendo o resultado
    $resultado = $stmt->get_result();

    // Verificando se encontrou o aluno
    if ($linha = $resultado->fetch_assoc()) {

        echo "<h2>Login bem-sucedido!</h2>";
        echo "<p>Bem-vindo, " . htmlspecialchars($linha['nome']) . "!</p>";

    } else {

        echo "<p>CPF ou senha incorretos.</p>";

    }

    $stmt->close();
    $conexao->close();

}

?>
```