<?php
include 'conexao.php';

// Verifica se o ID do processador foi fornecido
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obter os dados do processador
    $sql = "SELECT * FROM processadores WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o processador foi encontrado
    if ($result->num_rows > 0) {
        $processador = $result->fetch_assoc();
    } else {
        echo "Processador não encontrado.";
        exit;
    }
} else {
    echo "ID do processador não fornecido.";
    exit;
}

// Atualiza os dados do processador
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $socket = $_POST['socket'];
    $memoria_max = $_POST['memoria_max'];

    // Atualiza o processador no banco de dados
    $sql = "UPDATE processadores SET nome = ?, socket = ?, memoria_max = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nome, $socket, $memoria_max, $id);

    if ($stmt->execute()) {
        header("Location: index.php"); // Redireciona após a atualização
        exit;
    } else {
        echo "Erro ao atualizar processador.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Processador</title>
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
        }
        header h1 {
            font-size: 40px;
            font-weight: bold;
            margin: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 24px;
            color: #d8a42c;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
        .button-container {
            margin-top: 20px;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>MYPC</h1>
    </header>
    <div class="container">
        <h1>Editar Processador</h1>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($processador['nome']); ?>" required>

            <label for="socket">Socket:</label>
            <input type="text" id="socket" name="socket" value="<?php echo htmlspecialchars($processador['socket']); ?>" required>

            <label for="memoria_max">Memória Máxima:</label>
            <input type="number" id="memoria_max" name="memoria_max" value="<?php echo htmlspecialchars($processador['memoria_max']); ?>" required>

            <div class="button-container">
                <button type="submit" class="button">Salvar</button>
                <a href="index.php" class="button">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
