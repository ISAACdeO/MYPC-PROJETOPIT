<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Visualização das Builds</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #ffa500; /* Laranja */
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #444;
        }
        th {
            background-color: #222;
            color: #ffa500; /* Laranja */
        }
        tr:nth-child(even) {
            background-color: #333;
        }
        tr:hover {
            background-color: #444;
        }
        a {
            color: #ffa500; /* Laranja */
            text-decoration: none;
            padding: 10px;
            display: inline-block;
            margin-top: 20px;
            border: 1px solid #ffa500; /* Laranja */
            border-radius: 5px;
            background-color: #222;
        }
        a:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <h1>Builds Salvas</h1>

    <?php
    
    require __DIR__ . '/../model/Conexao.php';

    $conexao = new Conexao();
    $conn = $conexao->getConnection();

    $sql = "
        SELECT 
            b.nome_build,
            p.nome AS processador_nome,
            pm.nome AS placa_mae_nome,
            m.nome AS memoria_ram_nome,
            v.nome AS placa_video_nome,
            f.nome AS fonte_nome,
            b.preco_total
        FROM build_pc b
        JOIN processador p ON b.id_processador = p.id
        JOIN placa_mae pm ON b.id_placa_mae = pm.id
        JOIN memoria_ram m ON b.id_memoria_ram = m.id
        JOIN placa_video v ON b.id_placa_video = v.id
        JOIN fonte f ON b.id_fonte = f.id
    ";

    $result = $conn->query($sql);

    // Verifica se a consulta retornou resultados
    if ($result->num_rows > 0) {
        $builds = [];
        while ($row = $result->fetch_assoc()) {
            $builds[] = $row;
        }
    } else {
        $builds = [];
    }

    $conn->close();
    ?>

    <?php if (!empty($builds)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nome da Montagem</th>
                    <th>Processador</th>
                    <th>Placa-Mãe</th>
                    <th>Memória RAM</th>
                    <th>Placa de Vídeo</th>
                    <th>Fonte</th>
                    <th>Preço Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($builds as $build): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($build['nome_build']); ?></td>
                        <td><?php echo htmlspecialchars($build['processador_nome']); ?></td>
                        <td><?php echo htmlspecialchars($build['placa_mae_nome']); ?></td>
                        <td><?php echo htmlspecialchars($build['memoria_ram_nome']); ?></td>
                        <td><?php echo htmlspecialchars($build['placa_video_nome']); ?></td>
                        <td><?php echo htmlspecialchars($build['fonte_nome']); ?></td>
                        <td>R$<?php echo number_format($build['preco_total'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma montagem encontrada.</p>
    <?php endif; ?>

    <a href="index_build.php?action=showOrcamentoForm">Voltar</a>
</body>
</html>
