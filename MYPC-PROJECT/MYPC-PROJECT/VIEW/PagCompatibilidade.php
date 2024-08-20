<?php
include_once(__DIR__ . '/../MODEL/Conexao.php'); 
include_once(__DIR__ . '/../MODEL/class_compatibilidade.php'); 

// Inicializar a classe
$compatibilidade = new CompatibilidadeComponentes($pdo);
$mensagem = "";

// Processar a escolha do processador
if (isset($_POST['processador_id'])) {
    $processador_id = $_POST['processador_id'];
    $compatibilidade->verificarCompatibilidade($processador_id);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compatibilidade de Componentes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
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
    </style>
</head>
<body>
    <h1>Compatibilidade de Componentes</h1>

    <?php $compatibilidade->renderizarMensagem($mensagem); ?>

    <?php $compatibilidade->renderizarFormulario(); ?>

    <?php $compatibilidade->renderizarTabelaCompatibilidade(); ?>
</body>
</html>
