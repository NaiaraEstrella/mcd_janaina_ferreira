<?php
// criar.php
require 'config.php';

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $preco_custo = $_POST['preco_custo'];
    $preco_venda = $_POST['preco_venda'];

    // Prepara uma consulta SQL para inserir um novo registro na tabela
    $stmt = $pdo->prepare('INSERT INTO produtos (produto, quantidade, preco_custo, preco_venda) VALUES (?, ?, ?, ?)');
    $stmt->execute([$produto, $quantidade, $preco_custo, $preco_venda]);

    // Redireciona de volta para a página principal
    header('Location: index.php');
    exit; // Encerra o script para garantir que o redirecionamento ocorra imediatamente
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Produto</title>
</head>
<body>
    <h1>Adicionar Novo Produto</h1>
    <form method="post">
        <label>Produto:</label><br>
        <input type="text" name="produto" required><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" required><br><br>

        <label>Preço de Custo:</label><br>
        <input type="text" name="preco_custo" required><br><br>

        <label>Preço de Venda:</label><br>
        <input type="text" name="preco_venda" required><br><br>

        <button type="submit">Adicionar</button>
    </form>
    <br>
    <a href="index.php">Voltar</a>
</body>
</html>
