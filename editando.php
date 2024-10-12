<?php
// editar.php
require 'config.php';

// Obtém o ID do produto a ser editado
$id = $_GET['id'];

// Busca os dados atuais do produto
$stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o produto existe
if (!$produto) {
    echo "Produto não encontrado!";
    exit;
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $produto_nome = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $preco_custo = $_POST['preco_custo'];
    $preco_venda = $_POST['preco_venda'];

    // Atualiza o produto no banco de dados
    $stmt = $pdo->prepare('UPDATE produtos SET produto = ?, quantidade = ?, preco_custo = ?, preco_venda = ? WHERE id = ?');
    $stmt->execute([$produto_nome, $quantidade, $preco_custo, $preco_venda, $id]);

    // Redireciona de volta para a página principal
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
    <script>
        function confirmarEdicao() {
            return confirm('Tem certeza que deseja editar este produto?');
        }
    </script>
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="post" onsubmit="return confirmarEdicao();">
        <label>Produto:</label><br>
        <input type="text" name="produto" value="<?php echo htmlspecialchars($produto['produto']); ?>" required><br><br>

        <label>Quantidade:</label><br>
        <input type="number" name="quantidade" value="<?php echo htmlspecialchars($produto['quantidade']); ?>" required><br><br>

        <label>Preço de Custo:</label><br>
        <input type="text" name="preco_custo" value="<?php echo htmlspecialchars($produto['preco_custo']); ?>" required><br><br>

        <label>Preço de Venda:</label><br>
        <input type="text" name="preco_venda" value="<?php echo htmlspecialchars($produto['preco_venda']); ?>" required><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>
    <br>
    <a href="index.php">Voltar</a>
</body>
</html>
