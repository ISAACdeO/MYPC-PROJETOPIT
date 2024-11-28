<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../../Models/Componente_Model.php';

$model = new Componente();
$componentes = $model->buscarComponentes('fonte'); // Carrega as fontes do banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['componente_id'])) {
    $componenteId = $_POST['componente_id'];
    
    foreach ($componentes as $comp) {
        if ($comp['id'] == $componenteId) {
            $model->adicionarAoCarrinho($comp, 'fonte'); 
            break;
        }
    }
    
    header("Location: Fonte.php"); 
    exit; // Garante o redirecionamento imediato
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Selecionar Fonte</title>
</head>
<body>
    <h1>Selecione uma Fonte</h1>
    <form method="post">
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
            <?php foreach ($componentes as $componente): ?>
                <tr>
                    <td><?php echo htmlspecialchars($componente['id']); ?></td>
                    <td><?php echo htmlspecialchars($componente['nome']); ?></td>
                    <td><?php echo htmlspecialchars($componente['preco']); ?></td>
                    <td>
                        <button type="submit" name="componente_id" value="<?php echo $componente['id']; ?>">Adicionar ao Carrinho</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
    <a href="Carrinho_View.php">Ver Carrinho</a> <!-- Link para visualizar o carrinho -->
</body>
</html>
