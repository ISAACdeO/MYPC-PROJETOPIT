<?php
require __DIR__ . '/../MODEL/Conexao.php';
require __DIR__ . '/../MODEL/Topic.php';

$conexao = new Conexao();
$db = $conexao->getConnection();

$topic = new Topic($db);

if ($_POST) {
    $topic->titulo = $_POST['titulo'];
    $topic->descricao = $_POST['descricao'];

    if ($topic->create()) {
        header("Location: list_topics.php");
        exit();
    } else {
        $message = "<p class='error'>Erro ao criar tópico.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Tópico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 600px;
        }
        .container h1 {
            margin-top: 0;
            font-size: 2em;
            text-align: center;
            color: #333;
        }
        .container form {
            display: flex;
            flex-direction: column;
        }
        .container label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .container input[type="text"],
        .container textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .container input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .container .success {
            color: #28a745;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .container .error {
            color: #dc3545;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Criar Novo Tópico</h1>
        <?php if (isset($message)) echo $message; ?>
        <form action="create_topic.php" method="post">
            <label for="titulo">Título do Tópico:</label>
            <input type="text" name="titulo" id="titulo" required><br>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" rows="5" required></textarea><br>

            <input type="submit" value="Criar Tópico">
        </form>
    </div>
</body>
</html>
