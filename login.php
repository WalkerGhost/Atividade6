<? php
//Incluindo o arquivo de conexão nesse arquivo
include "conecta.php";

// Recebendo os dados do formulário
$cpf - $_POST['cpf']:
$senha - $_POST['senha'] :

// Consulta SQL SEGURA (com placeholders :epf e :senha, SEM aspas)
$sq1 - "SELECT * FROM aluno WHERE cpf = :cpf AND senha = :senha";

try {
// Preparando a consulta
$stmt: = $conexao->prepare($sq1) :

// Ligando os parâmetros
$stmt->bindParam(':cpf'. Sepf) :
$stmt->bindParam(':senha', $senha) ;

// Executando a consulta
$stmt->execute ():

if ( $1inha = $stmt->fetch() ) {// fetch() retorna false se não tiver linhas
echo "<p>Login bem-sucedido! Bem-vindo, ". $1inha['nome'] . " !< /p>";
} else {
echo "<p>CPF ou senha incorretos .< /p>":
}
} catch (PDOException Se) {
echo "Erro ao executar consulta: " . Se->getMessage():
}
?>
