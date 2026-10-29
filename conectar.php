<?php

$host = "sql208.infinityfree.com";
$banco = "if0_43289479_Walker";
$usuario = "if0_43289479";
$senha = "Walkergamer22";

mysqli_report(MYSQLI_REPORT_OFF);

$conexao = new mysqli(
    $host,
    $usuario,
    $senha,
    $banco,
    3306
);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

?>
