
<?php

// Dados de conexão com o banco de dados
$host = "SEU_HOST_MYSQL";
$banco = "SEU_NOME_DO_BANCO";
$usuario = "SEU_USUARIO_MYSQL";
$senha = "SUA_SENHA_MYSQL";

// Configuração da conexão
try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    // Configura o PDO para apresentar exceções em caso de erro
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    // Define o modo de retorno dos resultados
    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

} catch (PDOException $e) {

    // Mensagem caso ocorra algum erro
    die("Erro ao conectar ao banco de dados.");

}

?>
