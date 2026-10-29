
<?php
session_start();

require_once "conecta.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cpf = trim($_POST["cpf"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if ($cpf == "" || $senha == "") {
        die("Digite o CPF e a senha.");
    }

    $consulta = "SELECT id, nome FROM aluno WHERE cpf = ? AND senha = ?";

    $resultado = $conexao->prepare($consulta);

    if (!$resultado) {
        die("Erro ao fazer a consulta.");
    }

    $resultado->bind_param("ss", $cpf, $senha);

    if ($resultado->execute()) {

        $resultado->bind_result($id, $nome);

        if ($resultado->fetch()) {

            $_SESSION["aluno_id"] = $id;
            $_SESSION["aluno_nome"] = $nome;

            $resultado->close();
            $conexao->close();

            header("Location: lista.php");
            exit;

        } else {
            echo "CPF ou senha inválidos.";
            echo "<br><a href='index.php'>Tentar novamente</a>";
        }

    } else {
        die("Não foi possível realizar a consulta.");
    }

    $resultado->close();
    $conexao->close();

} else {
    header("Location: index.php");
    exit;
}
?>
