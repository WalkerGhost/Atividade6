```php
<?php

// Incluindo a conexão
include "conecta.php";

// Consulta SQL
$sql = "SELECT * FROM aluno";

// Preparando a consulta
$stmt = $conexao->prepare($sql);

// Executando
$stmt->execute();

// Obtendo os resultados
$resultado = $stmt->get_result();

// Listando os alunos
while ($linha = $resultado->fetch_assoc()) {

    echo "<p>";

    echo "<b>Nome: </b>" . htmlspecialchars($linha['nome']);

    echo " <b>Senha: </b>" . htmlspecialchars($linha['senha']);

    echo "</p>";

}

$stmt->close();
$conexao->close();

?>
```