<?php
include_once('../../MODEL/Conexao.php');

$conexao = new Conexao();
$conn = $conexao->getConnection(); 

$sql = "SELECT * FROM tecnico";
$resultMysql = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha um Técnico</title>
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
        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #2a2a2a; 
            border-radius: 8px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 15px;
            border-bottom: 1px solid #444; 
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #333; 
        }
        li:last-child {
            border-bottom: none;
        }
        a {
            color: #FFA500; 
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
            color: #ffcc00; 
        p {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Escolha um Técnico para Enviar Mensagem</h2>
        <?php
            if ($resultMysql->num_rows > 0) {
                echo "<ul>";
                while($row = $resultMysql->fetch_assoc()) {
                    echo "<li>" . htmlspecialchars($row["nome"]) . " - <a href='MandarMensagem.php?idtecnico=" . urlencode($row["idtecnico"]) . "'>Enviar Mensagem</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nenhum técnico encontrado.</p>";
            }
        ?>
    </div>
</body>
</html>
