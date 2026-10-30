<?php

require_once(__DIR__ . "/conecta.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM aluno WHERE cpf = ? AND senha = ?";

    $stmt = $conexao->prepare($sql);

    if (!$stmt) {
        die("Erro na consulta: " . $conexao->error);
    }

    $stmt->bind_param("ss", $cpf, $senha);

    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($linha = $resultado->fetch_assoc()) {

        echo "<h2>Login bem-sucedido!</h2>";
        echo "<p>Bem-vindo, "
            . htmlspecialchars($linha['nome'])
            . "!</p>";

    } else {

        echo "<h2>CPF ou senha incorretos!</h2>";

        echo '<a href="index.php">Voltar ao login</a>';

    }

    $stmt->close();
    $conexao->close();

} else {

    header("Location: index.php");
    exit;

}

?>