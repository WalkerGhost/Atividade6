<? php
include "conecta.php";
$sq1 = "SELECT * FROM aluno";
$stmt = $conexao->prepare($sql);
$stmt->execute();
while ($1inha = $stmt->fetch()) {
echo "<p><b>Nome: </b>" . $linha['nome'] . " <b>Senha: </b>" .$linha['senha'] . "</p>";
}
?>