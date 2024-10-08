<?php
include_once(__DIR__ . '/../MODEL/Conexao.php'); 
include_once(__DIR__ . '/../MODEL/class_compatibilidade_video.php'); 

// Conectar ao banco de dados usando mysqli
$mysqli = new mysqli("localhost", "root", "root", "MYPC_DB");

// Verificar se houve erro na conexão
if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Inicializar a classe
$compatibilidade = new CompatibilidadePlacaVideo($mysqli);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $processador_id = filter_input(INPUT_POST, 'processador_id', FILTER_VALIDATE_INT);
    if ($processador_id) {
        $compatibilidade->verificarCompatibilidade($processador_id);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compatibilidade de Placas de Vídeo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #d8a42c;
        }
        form {
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: orange;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: gray;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .mensagem {
            color: orange;
            text-align: center;
        }
        .header {
            background-color: #1f1f1f;
            color: #d8a42c;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo {
            font-size: 1.5em;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="header">
        <div class="logo">MYPC</div>
        <div class="welcome">Bem-vindo, Conta</div>
    </div>
    <h1>Verificação de Compatibilidade de Placas de Vídeo</h1>

    <?php
    $compatibilidade->renderizarFormulario();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $compatibilidade->renderizarTabelaCompatibilidade();
    }
    ?>
</body>
</html>
