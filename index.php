<?php
// index.php
require 'config.php';

// Executa uma consulta SQL para selecionar todos os registros da tabela
$stmt = $pdo->query('SELECT * FROM produtos');
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Estoque do Mercado</title>
</head>
<body>
    <h1>Produtos no Estoque</h1>
    <a href="criaando.php">Adicionar Novo Produto</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço de Custo</th>
                <th>Preço de Venda</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>  <!-- Laço para percorrer todos os registros -->
            <tr>
                <td><?php echo htmlspecialchars($produto['id']); ?></td>
                <td><?php echo htmlspecialchars($produto['produto']); ?></td>
                <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                <td><?php echo htmlspecialchars($produto['preco_custo']); ?></td>
                <td><?php echo htmlspecialchars($produto['preco_venda']); ?></td>
                <td>
                    <a href="editaando.php?id=<?php echo $produto['id']; ?>">Editar</a> |
                    <a href="deletando.php?id=<?php echo $produto['id']; ?>">Deletar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
