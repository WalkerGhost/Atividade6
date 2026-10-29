
<?php
session_start();
require_once "conecta.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = trim($_POST["cpf"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if (empty($cpf) || empty($senha)) {
        echo "Preencha todos os campos.";
        exit;
    }

    $sql = "SELECT id, nome FROM aluno WHERE cpf = ? AND senha = ?";
    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("ss", $cpf, $senha);
    $stmt->execute();
    $stmt->bind_result($id, $nome);

    if ($stmt->fetch()) {
        $_SESSION["aluno_id"] = $id;
        $_SESSION["aluno_nome"] = $nome;

        header("Location: lista.php");
        exit;
    } else {
        echo "CPF ou senha incorretos.<br>";
        echo "<a href='index.php'>Voltar</a>";
    }

    $stmt->close();
    $conexao->close();
} else {
    header("Location: index.php");
    exit;
}
?>
