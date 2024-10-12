<?php
// config.php

$host = 'localhost'; 
$db   = 'estoque'; //nome do database que está utilizando no mysql
$user = 'root'; //Seu usuario no mysql
$pass = 'cimatec'; // Sua senha de usuario do mysql
$charset = 'utf8mb4'; // Informa ao pdo qual conjuto de caracteres usar na conexão. Isso é importante para garantir que todos os caracteres sejam armazenasdos e recuperados de forma correta no banco de dados 

$dsn = "mysql:host=$host;dbname=$db;usuario=$user;senha=$pass;charset=$charset";

try {
    // Tenta criar uma nova instância PDO com as configurações fornecidas
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Caso ocorra um erro na conexão, exibe uma mensagem amigável e encerra o script
    echo "Não foi possível conectar ao banco de dados. Por favor, tente novamente mais tarde.";
    // Opcional: Registrar o erro detalhado nos logs do servidor
    error_log("Erro de conexão PDO: " . $e->getMessage());
    exit(); // Encerra o script
}
?>
