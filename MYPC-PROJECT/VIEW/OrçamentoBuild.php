<?php
session_start();

// Inclua a classe de conexão ao banco de dados
include_once(__DIR__ . '/../MODEL/Conexao.php');
// Inclua a classe de construção de PC
include_once(__DIR__ . '/../MODEL/Class_PCBuilder.php');

$conn = new Conexao();
$db = $conn->getConnection(); 

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento Build</title>
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #ffffff;
        }

        form {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        label, input[type="submit"] {
            display: block;
            margin-bottom: 10px;
        }

        label {
            font-size: 1.2em;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #333;
            background-color: #333;
            color: #e0e0e0;
        }

        input[type="submit"] {
            background-color: #6200ea;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #3700b3;
        }

        .componentes {
            margin-top: 20px;
            width: 80%;
            max-width: 800px;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .componente {
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid #333;
        }

        .componente h3 {
            margin: 0 0 10px 0;
            color: #bb86fc;
        }

        .componente p {
            margin: 5px 0;
        }

        .componente img {
            max-width: 100%;
            border-radius: 4px;
        }

        .componente a {
            color: #bb86fc;
            text-decoration: none;
        }

        .componente a:hover {
            text-decoration: underline;
        }

        hr {
            border: 1px solid #333;
        }

        .btn-montar {
            display: block;
            margin-top: 20px;
            background-color: #03dac6;
            color: #000000;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
        }

        .btn-montar:hover {
            background-color: #018786;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="orcamento">Informe seu orçamento:</label>
        <input type="number" id="orcamento" name="orcamento" required>
        <input type="submit" value="Buscar Componentes">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $orcamento = $_POST['orcamento'];
        $pcBuilder = new Class_PCBuilder($db);
        $componentes = $pcBuilder->buscarComponentesPorOrcamento($orcamento);
        
        if (!empty($componentes)) {
            echo "<div class='componentes'>";
            echo "<h2>Componentes Selecionados</h2>";
            foreach ($componentes as $tipo => $componente) {
                echo "<div class='componente'>";
                echo "<h3>{$componente['nome']}</h3>";
                echo "<p>Preço: R$ " . number_format($componente['preco'], 2, ',', '.') . "</p>";
                echo "<p>{$componente['descricao']}</p>";
                echo "<p><a href='{$componente['link_loja']}' target='_blank'>Comprar</a></p>";
                echo "<img src='{$componente['imagem']}' alt='{$componente['nome']}'>";
                echo "</div><hr>";
            }
            echo "<a href='MontagemFinal.php' class='btn-montar'>Montar</a>";
            $_SESSION['componentes'] = $componentes;
            $_SESSION['orcamento'] = $orcamento;
            echo "</div>";
        } else {
            echo "<p>Nenhum componente encontrado dentro do orçamento.</p>";
        }
    }
    ?>
        <button class="btn-voltar" onclick="window.history.back()">Voltar</button>

</body>
</html>
