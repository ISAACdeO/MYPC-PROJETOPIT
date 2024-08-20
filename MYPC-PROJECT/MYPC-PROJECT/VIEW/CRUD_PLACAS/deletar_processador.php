<?php
include_once('D:/CURSOS/www/MYPC-PROJETOPIT-main/MYPC-PROJECT/MODEL/Conexao.php');

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

// Deleta o processador do banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM processadores WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php"); // Redireciona após a exclusão
        exit;
    } else {
        echo "Erro ao deletar processador.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deletar Processador</title>
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
        p {
            font-size: 18px;
            margin-bottom: 20px;
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
        <h1>Deletar Processador</h1>
        <p>Tem certeza de que deseja deletar o processador com o ID <?php echo htmlspecialchars($processador['id']); ?>?</p>

        <div class="button-container">
            <form method="post">
                <button type="submit" class="button">Deletar</button>
                <a href="index.php" class="button">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>
