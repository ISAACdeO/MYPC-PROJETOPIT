<?php

include_once '../MODEL/Conexao.php';
include_once '../MODEL/Topic.php';


$database = new Conexao();
$db = $database->getConnection();


$topic = new Topic($db);


$stmt = $topic->readAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Fórum - Listagem de Tópicos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .forum-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .forum-header .create-topic-button {
            margin-bottom: 20px;
        }
        .forum-header .create-topic-button a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            display: inline-block;
        }
        .forum-header .create-topic-button a:hover {
            background-color: #0056b3;
        }
        .forum-post {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .forum-post h2 {
            margin: 0;
            font-size: 1.5em;
        }
        .forum-post p {
            margin: 10px 0;
        }
        .forum-post .date {
            color: #777;
        }
        .forum-post a {
            text-decoration: none;
            color: #007bff;
        }
        .forum-post a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="forum-header">
        <h1>Fórum</h1>
        <p>Veja os tópicos abaixo e participe da discussão.</p>
        <div class="create-topic-button">
            <a href="create_topic.php">Criar Novo Tópico</a>
        </div>
    </div>

    <?php
  
    if ($stmt->num_rows > 0) {
        while ($row = $stmt->fetch_assoc()) {
            echo '<div class="forum-post">';
            echo '<h2><a href="view_topic.php?id=' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['titulo']) . '</a></h2>';
            echo '<p>' . htmlspecialchars($row['descricao']) . '</p>';
            echo '<p class="date">Criado em: ' . htmlspecialchars($row['data_criacao']) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>Nenhum tópico encontrado</p>';
    }
    ?>

</body>
</html>
