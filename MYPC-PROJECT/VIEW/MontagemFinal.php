<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Montagem Final</title>
    <style>
        body {
            background-color: #1e1e1e;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #FFA500;
            margin-bottom: 20px;
        }

        form {
            background-color: #2b2b2b;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #FFA500;
            font-weight: bold;
        }

        tr {
            border-bottom: 1px solid #444;
        }

        tr:last-child {
            border-bottom: none;
        }

        tr:hover {
            background-color: #444;
        }

        td {
            color: #ddd;
        }

        .component-group label {
            display: block;
            margin-bottom: 5px;
            color: #FFA500;
        }

        .component-group input[type="radio"] {
            margin-right: 10px;
        }

        .submit-button {
            background-color: #FFA500;
            color: #1e1e1e;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #ffb833;
        }

        a {
            color: #FFA500;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Escolha seus Componentes</h1>

    <form action="index_build.php?action=saveBuild" method="post">
        <label for="nome_build">Nome da Montagem:</label>
        <input type="text" name="nome_build" id="nome_build" required><br><br>

        <div class="component-group">
            <label>Processador:</label>
            <table>
                <?php foreach ($components['processadores'] as $processador): ?>
                <tr>
                    <td>
                        <input type="radio" name="id_processador" value="<?php echo htmlspecialchars($processador['id']); ?>" required>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($processador['nome']); ?>
                    </td>
                    <td>
                        R$<?php echo number_format($processador['preco'], 2, ',', '.'); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="component-group">
            <label>Placa-Mãe:</label>
            <table>
                <?php foreach ($components['placas_mae'] as $placaMae): ?>
                <tr>
                    <td>
                        <input type="radio" name="id_placa_mae" value="<?php echo htmlspecialchars($placaMae['id']); ?>" required>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($placaMae['nome']); ?>
                    </td>
                    <td>
                        R$<?php echo number_format($placaMae['preco'], 2, ',', '.'); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="component-group">
            <label>Memória RAM:</label>
            <table>
                <?php foreach ($components['memorias_ram'] as $memoriaRam): ?>
                <tr>
                    <td>
                        <input type="radio" name="id_memoria_ram" value="<?php echo htmlspecialchars($memoriaRam['id']); ?>" required>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($memoriaRam['nome']); ?>
                    </td>
                    <td>
                        R$<?php echo number_format($memoriaRam['preco'], 2, ',', '.'); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="component-group">
            <label>Placa de Vídeo:</label>
            <table>
                <?php foreach ($components['placas_video'] as $placaVideo): ?>
                <tr>
                    <td>
                        <input type="radio" name="id_placa_video" value="<?php echo htmlspecialchars($placaVideo['id']); ?>" required>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($placaVideo['nome']); ?>
                    </td>
                    <td>
                        R$<?php echo number_format($placaVideo['preco'], 2, ',', '.'); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="component-group">
            <label>Fonte:</label>
            <table>
                <?php foreach ($components['fontes'] as $fonte): ?>
                <tr>
                    <td>
                        <input type="radio" name="id_fonte" value="<?php echo htmlspecialchars($fonte['id']); ?>" required>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($fonte['nome']); ?>
                    </td>
                    <td>
                        R$<?php echo number_format($fonte['preco'], 2, ',', '.'); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <button type="submit" class="submit-button">Salvar Montagem</button>
    </form>

    <a href="index_build.php?action=showOrcamentoForm">Voltar</a>
</body>
</html>
