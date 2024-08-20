<?php
include_once('D:/CURSOS/www/MYPC-PROJETOPIT-main/MYPC-PROJECT/MODEL/Conexao.php');

// Cria uma instância da classe Conexao
$conexao = new Conexao();
$conn = $conexao->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $socket = $_POST['socket'];
    $memoria_max = $_POST['memoria_max'];

    // Prepara e executa a consulta para adicionar a nova placa-mãe
    $sql = "INSERT INTO placas_mae (nome, socket, memoria_max) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nome, $socket, $memoria_max);

    if ($stmt->execute()) {
        $msg = "Placa-mãe adicionada com sucesso!";
    } else {
        $msg = "Erro ao adicionar placa-mãe: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Placa-Mãe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #d8a42c;
            padding: 20px;
            color: #fff;
            text-align: left;
            font-size: 2em;
            font-weight: bold;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .button {
            background-color: #d8a42c;
            color: #000;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>MYPC</header>

    
    <div class="container">
        <h1>Adicionar Placa-Mãe</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="socket">Socket:</label>
                <input type="text" id="socket" name="socket" required>
            </div>
            <div class="form-group">
                <label for="memoria_max">Memória Máxima (GB):</label>
                <input type="number" id="memoria_max" name="memoria_max" required>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Adicionar</button>
            </div>
        </form>
        <?php
        if (isset($msg)) {
            echo "<div class='message'>$msg</div>";
        }
        ?>
    </div>
</body>
</html>
