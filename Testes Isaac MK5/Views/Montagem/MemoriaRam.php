<?php
require_once '../../Config/Conexao.php';
require_once '../../Models/MemoriaRam_Model.php';

$memoriaRamModel = new MemoriaRam();
$memoriasRam = $memoriaRamModel->selectMemoria();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Memórias RAM</title>
    <a href="TelaInicial.php"><h1>Voltar</h1></a>

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
    <h1>Lista de Memórias RAM</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($memoriasRam)): ?>
                <?php foreach ($memoriasRam as $memoria): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($memoria['id']); ?></td>
                        <td><?php echo htmlspecialchars($memoria['nome']); ?></td>
                        <td><?php echo htmlspecialchars($memoria['preco']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Nenhuma memória RAM encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
