<?php
include 'conexao.php';

$sqlPlacasMae = "SELECT * FROM placas_mae";
$resultPlacasMae = $conn->query($sqlPlacasMae);

$sqlProcessadores = "SELECT * FROM processadores";
$resultProcessadores = $conn->query($sqlProcessadores);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Placas-Mãe e Processadores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #d8a42c;
            padding: 20px;
            text-align: left;
            color: black;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        header h1 {
            font-size: 40px;
            font-weight: bold;
            margin: 0;
            color: #000;
        }
        h1 {
            font-size: 28px;
            color: #d8a42c;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #d8a42c;
            color: black;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .button {
            background-color: #d8a42c;
            color: black;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .buttons-container {
            margin-bottom: 30px;
        }
        .buttons-container a {
            margin-right: 10px;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>MYPC</h1>
    </header>

    <div class="container">
        <h1>Placas-Mãe</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Socket</th>
                <th>Memória Máxima</th>
                <th>Ações</th>
            </tr>
            <?php
            if ($resultPlacasMae->num_rows > 0) {
                while($row = $resultPlacasMae->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["socket"]. "</td><td>" . $row["memoria_max"]. "</td>";
                    echo "<td><a href='editar_placa_mae.php?id=" . $row["id"] . "' class='button'>Editar</a> <a href='deletar_placa_mae.php?id=" . $row["id"] . "' class='button'>Deletar</a></td></tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum resultado encontrado</td></tr>";
            }
            ?>
        </table>
        <div class="buttons-container">
            <a href="adicionar_placa_mae.php" class="button">Adicionar Placa-Mãe</a>
        </div>

        <h1>Processadores</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Socket</th>
                <th>Memória Máxima</th>
                <th>Ações</th>
            </tr>
            <?php
            if ($resultProcessadores->num_rows > 0) {
                while($row = $resultProcessadores->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["socket"]. "</td><td>" . $row["memoria_max"]. "</td>";
                    echo "<td><a href='editar_processador.php?id=" . $row["id"] . "' class='button'>Editar</a> <a href='deletar_processador.php?id=" . $row["id"] . "' class='button'>Deletar</a></td></tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum resultado encontrado</td></tr>";
            }
            ?>
        </table>
        <div class="buttons-container">
            <a href="adicionar_processador.php" class="button">Adicionar Processador</a>
        </div>
    </div>
</body>
</html>
