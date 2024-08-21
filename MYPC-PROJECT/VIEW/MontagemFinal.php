<?php
session_start();
$componentes = $_SESSION['componentes'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montagem Final</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
        }
        tr:nth-child(even) {
            background-color: #1e1e1e;
        }
    </style>
</head>
<body>
    <h2>Componentes Selecionados</h2>
    <table>
        <thead>
            <tr>
                <th>Componente</th>
                <th>Descrição</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $precoTotal = 0;
            foreach ($componentes as $tipo => $componente) {
                $precoTotal += $componente['preco'];
                echo "<tr>";
                echo "<td>{$componente['nome']}</td>";
                echo "<td>{$componente['descricao']}</td>";
                echo "<td>R$ " . number_format($componente['preco'], 2, ',', '.') . "</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td><strong>R$ <?= number_format($precoTotal, 2, ',', '.') ?></strong></td>
            </tr>
        </tbody>
    </table>
    <button class="btn-voltar" onclick="window.history.back()">Voltar</button>

</body>
</html>
