<?php
require_once '../../Models/Componente_Model.php';

$model = new Componente();
$carrinho = $model->obterCarrinho();
$precoTotal = $model->calcularPrecoTotal();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
</head>
<body>
    <h1>Carrinho de Compras</h1>
    <table>
        <tr>
            <th>Componente</th>
            <th>Nome</th>
            <th>Preço</th>
        </tr>
        <?php if (!empty($carrinho)): ?>
            <?php foreach ($carrinho as $tipo => $item): ?>
                <tr>
                    <td><?php echo ucfirst($tipo); ?></td>
                    <td><?php echo htmlspecialchars($item['nome']); ?></td>
                    <td><?php echo htmlspecialchars($item['preco']); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2"><strong>Total:</strong></td>
                <td><strong><?php echo htmlspecialchars($precoTotal); ?></strong></td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="3">Carrinho vazio.</td>
            </tr>
        <?php endif; ?>
    </table>
    <a href="Fonte_View.php">Adicionar Mais Componentes</a>
    <br><br>
    <form action="FinalizarCompra.php" method="post">
        <button type="submit">Finalizar Montagem do Computador</button>
    </form>
</body>
</html>
