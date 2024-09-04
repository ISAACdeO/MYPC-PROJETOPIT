<?php
include_once('../../MODEL/Conexao.php');

$conexao = new Conexao();
$conn = $conexao->getConnection(); 

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$Tecnico = isset($_GET['idtecnico']) ? intval($_GET['idtecnico']) : null;

$result = null;

if ($Tecnico) {
    $sql = "SELECT m.texto AS mensagem, u.nome AS nome_usuario, m.data_envio
            FROM mensagem m
            JOIN usuario u ON m.idusuario = u.idusuario
            WHERE m.idtecnico = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("i", $Tecnico);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
} else {
    echo "ID do técnico não fornecido.";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens do Técnico</title>
    <style>
        body {
            background-color: #1c1c1c;
            color: #f5f5f5; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h2 {
            color: #FFA500; 
            margin: 20px 0;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #2a2a2a; 
            border-radius: 8px;
            text-align: left;
        }
        .message {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            background-color: #333; 
        }
        .message .user {
            font-weight: bold;
            color: #FFA500; 
            margin-bottom: 5px;
        }
        .message .text {
            background-color: #444; 
            border-radius: 8px;
            padding: 10px;
            max-width: 80%;
            display: inline-block;
            color: #f5f5f5; 
            margin-bottom: 5px;
        }
        .message .timestamp {
            font-size: 0.75em;
            color: #888; 
        }
        .back-link {
            color: #FFA500; 
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mensagens Recebidas</h2>
        <a class="back-link" href="ListaEquipe.php">Voltar para a lista de técnicos</a>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="message">
                    <div class="user"><?php echo htmlspecialchars($row['nome_usuario']); ?></div>
                    <div class="text"><?php echo nl2br(htmlspecialchars($row['mensagem'])); ?></div>
                    <div class="timestamp"><?php echo htmlspecialchars($row['data_envio']); ?></div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nenhuma mensagem encontrada.</p>
        <?php endif; ?>
    </div>
</body>
</html>
