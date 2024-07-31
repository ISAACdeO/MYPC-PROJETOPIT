<?php
include 'conexao.php';

// Verifica se o ID foi fornecido na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID da placa-mãe não fornecido.");
}

$id = intval($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $socket = $_POST['socket'];
    $memoria_max = $_POST['memoria_max'];

    // Prepara e executa a consulta para atualizar a placa-mãe
    $sql = "UPDATE placas_mae SET nome=?, socket=?, memoria_max=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nome, $socket, $memoria_max, $id);

    if ($stmt->execute()) {
        $msg = "Placa-mãe atualizada com sucesso!";
    } else {
        $msg = "Erro ao atualizar placa-mãe: " . $conn->error;
    }

    $stmt->close();
}

// Consulta para obter os detalhes da placa-mãe
$sqlPlacaMae = "SELECT * FROM placas_mae WHERE id=?";
$stmt = $conn->prepare($sqlPlacaMae);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $placaMae = $result->fetch_assoc();
} else {
    die("Placa-mãe não encontrada.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Placa-Mãe</title>
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
        <h1>Editar Placa-Mãe</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $id; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($placaMae['nome']); ?>" required>
            </div>
            <div class="form-group">
                <label for="socket">Socket:</label>
                <input type="text" id="socket" name="socket" value="<?php echo htmlspecialchars($placaMae['socket']); ?>" required>
            </div>
            <div class="form-group">
                <label for="memoria_max">Memória Máxima (GB):</label>
                <input type="number" id="memoria_max" name="memoria_max" value="<?php echo htmlspecialchars($placaMae['memoria_max']); ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Atualizar</button>
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
