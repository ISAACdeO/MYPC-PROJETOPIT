<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendação de Computadores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="conteiner-1">
            <h1>Computador</h1>
            <h2>Temos algumas sugestões de Computadores que você pode gostar!</h2>
        </div>
    </header>


<?php
include_once(__DIR__ . '/../MODEL/Conexao.php'); 

// Consulta SQL para filtragem de dados
$sql = "SELECT marca, descricao, preco, site, imagem FROM Computador";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iniciar a tabela HTML com classe para estilização
    echo '<div class="horizontal-table">';
    echo '<table>';

    // Cabeçalho da tabela
    echo '<tr>';
    echo '<th>Imagem</th>';  // Adicionando cabeçalho para a imagem
    echo '<th>Marca</th>';
    echo '<th>Descrição</th>';
    echo '<th>Preço</th>';
    echo '<th>Site</th>';
    echo '</tr>';

    // Linha de dados da tabela / adiciona as linhas de dados
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td><img src="' . htmlspecialchars($row["imagem"]) . '" alt="Imagem do Notebook" style="width:100px; height:auto;"></td>';  // Adicionando a imagem
        echo '<td>' . htmlspecialchars($row["marca"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["descricao"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["preco"]) . '</td>';
        echo '<td><a href="' . htmlspecialchars($row["site"]) . '" target="_blank">Ver Produto</a></td>';
        echo '</tr>';
    }

    // Fechar a tabela HTML
    echo '</table>';
    echo '</div>';
} else {
    echo "Nenhum resultado encontrado.";
}

// Fechar a conexão
$conn->close();
?>
</body>
</html>
