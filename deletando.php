<?php
// deletar.php
require 'config.php';

// Obtém o ID do produto a ser deletado
$id = $_GET['id'];

// Busca os dados do produto para exibir na confirmação
$stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o produto existe
if (!$produto) {
    echo "Produto não encontrado!";
    exit;
}

// Verifica se a confirmação foi feita
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirmar'])) {
        // Deleta o produto do banco de dados
        $stmt = $pdo->prepare('DELETE FROM produtos WHERE id = ?');
        $stmt->execute([$id]);
    }
    // Redireciona de volta para a página principal
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deletar Produto</title>
</head>
<body>
    <h1>Deletar Produto</h1>
    <p>Tem certeza que deseja deletar o produto <strong><?php echo htmlspecialchars($produto['produto']); ?></strong>?</p>
    <form method="post">
        <button type="submit" name="confirmar">Sim, Deletar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
