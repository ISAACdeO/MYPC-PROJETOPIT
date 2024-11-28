<?php
require_once '../../Config/Conexao.php'; 
require_once '../../Models/Computador/Computador.php'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Placas Mãe</title>
    <a href="../Homes.php"><h1>Voltar</h1></a>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Placas de Vídeo</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($placasMae)): ?>
                <?php foreach ($placasMae as $placa): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($placa['id']); ?></td>
                        <td><?php echo htmlspecialchars($placa['nome']); ?></td>
                        <td><?php echo htmlspecialchars($placa['preco']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Nenhuma placa Mãe encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
