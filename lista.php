```php
<?php

// Conectar ao banco de dados
require_once(__DIR__ . "/conecta.php");

// Buscar todos os alunos
$sql = "SELECT * FROM aluno";

$resultado = $conexao->query($sql);

// Verificar erros
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

        .mensagem {
            text-align: center;
            padding: 20px;
        }

        .voltar {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background: #263b5e;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
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

        echo "<div class='mensagem'>";
        echo "Nenhum aluno cadastrado no banco de dados.";
        echo "</div>";

    }

    $conexao->close();

    ?>

    <a href="index.php" class="voltar">Voltar ao login</a>

</div>

</body>
</html>
```