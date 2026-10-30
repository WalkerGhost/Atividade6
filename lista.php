
<?php

require_once(__DIR__ . "/conecta.php");

$sql = "SELECT * FROM aluno";

$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro ao consultar alunos: " . $conexao->error);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Alunos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #263b5e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th {
            background: #263b5e;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f5fa;
        }
    </style>

</head>

<body>

<div class="container">

    <h1>Alunos cadastrados</h1>

    <?php

    if ($resultado->num_rows > 0) {

        echo "<table>";

        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>CPF</th>";
        echo "</tr>";

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

    $conexao->close();

    ?>

    <br><br>

    <a href="index.php">Voltar ao login</a>

</div>

</body>
</html>
