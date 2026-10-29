<?php
include "conecta.php";
$sql = "SELECT * FROM aluno";
$stmt = $conexao->prepare($sql);
$stmt->execute();
while ($linha = $stmt->fetch()) {
    echo "<p><b>Nome: </b>" . $linha['nome'] . " <b>Senha: </b>" . $linha['senha'] . "</p>";
}
?>
