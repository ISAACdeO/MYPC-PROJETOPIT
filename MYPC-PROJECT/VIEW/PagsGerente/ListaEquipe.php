<?php
include_once('../../MODEL/Conexao.php');

$conexao = new Conexao();
$conn = $conexao->getConnection(); 

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM tecnico";
$resultMysql = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Técnicos</title>
    <style>
        body {
            background-color: #1c1c1c; 
            color: #f5f5f5; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h2 {
            margin-top: 20px;
            color: #FFA500; 
        }
        table {
            width: 80%;
            max-width: 1200px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #2a2a2a;
            border-radius: 8px;
            overflow: hidden; 
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #444; 
        }
        th {
            background-color: #333; 
            color: #FFA500; 
        }
        tr:nth-child(even) {
            background-color: #2a2a2a; 
        }
        tr:nth-child(odd) {
            background-color: #1c1c1c; 
        }
        a {
            color: #FFA500; 
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <h2>Lista de Técnicos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($resultMysql->num_rows > 0) {
            while($row = $resultMysql->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["idtecnico"]) . "</td>
                        <td>" . htmlspecialchars($row["nome"]) . "</td>
                        <td>" . htmlspecialchars($row["email"]) . "</td>
                        <td><a href='Visualizar.php?idtecnico=" . urlencode($row["idtecnico"]) . "'>Ver Mensagens</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum técnico encontrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>
