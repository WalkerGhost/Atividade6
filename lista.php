
<?php

// Incluindo o arquivo de conexão
require_once(__DIR__ . "/conecta.php");

// Consulta SQL para buscar os alunos
$sql = "SELECT * FROM aluno";

// Executando a consulta
$resultado = $conexao->query($sql);

// Verificando se houve erro
if (!$resultado) {
    die("Erro na consulta: " . $conexao->error);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
</head>

<body>

    <h1>Alunos cadastrados</h1>

    <?php

    // Verificando se existem alunos cadastrados
    if ($resultado->num_rows > 0) {

        echo "<table border='1' cellpadding='10'>";

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>CPF</th>";
        echo "</tr>";

        // Percorrendo os registros
        while ($linha = $resultado->fetch_assoc()) {

            echo "<tr>";

            echo "<td>" . htmlspecialchars($linha['id']) . "</td>";

            echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";

            echo "<td>" . htmlspecialchars($linha['cpf']) . "</td>";

            echo "</tr>";

        }

        echo "</table>";

    } else {

        echo "<p>Nenhum aluno cadastrado.</p>";

    }

    // Fechando a conexão
    $conexao->close();

    ?>

</body>
</html>
