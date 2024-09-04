<?php
include_once('../../MODEL/Conexao.php');

$conexao = new Conexao();
$conn = $conexao->getConnection(); 

$Tecnico = isset($_GET['idtecnico']) ? $_GET['idtecnico'] : null;
$Usuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $Usuario && $Tecnico) {
    $Mensagem = $_POST['texto'];

    $sql = "INSERT INTO mensagem (idusuario, idtecnico, texto) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $Usuario, $Tecnico, $Mensagem);

    if ($stmt->execute()) {
        $msg = "Mensagem Enviada!";
    } else {
        $msg = "Erro ao enviar mensagem: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Mensagem</title>
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
        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #2a2a2a; 
            border-radius: 8px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        textarea {
            width: 100%;
            max-width: 500px;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #333; 
            color: #f5f5f5; 
            resize: vertical; 
        }
        button {
            background-color: #FFA500; 
            color: #1c1c1c; 
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #ffcc00; 
        .message {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #FFA500; 
            background-color: #333; 
            color: #FFA500; 
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
        }
        .button-container button {
            background-color: #FF5733; 
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .button-container button:hover {
            background-color: #FF6F47; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enviar Mensagem</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?idtecnico=$Tecnico"; ?>">
            <input type="hidden" name="idusuario" value="1"> <!-- Substitua pelo ID do usuário atual -->
            <textarea name="texto" id="texto" rows="5" placeholder="Digite sua mensagem..."></textarea><br>
            <button type="submit">Enviar Mensagem</button>
        </form>
        <?php
            if (isset($msg)) {
                echo "<div class='message'>$msg</div>";
            }
        ?>
        <div class="button-container">
            <a href="ListaEquipe.php">
                <button type="button">Voltar para Lista de Técnicos</button>
            </a>
        </div>
    </div>
</body>
</html>
