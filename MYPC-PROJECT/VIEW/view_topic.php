<?php
include_once '../MODEL/Conexao.php';
include_once '../MODEL/Topic.php';
include_once '../MODEL/Comment.php';

$database = new Conexao();
$db = $database->getConnection();

$topic = new Topic($db);
$comment = new Comment($db);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $topic->id = $_GET['id'];

    if ($topic->readOne()) {
        $comment->topico_id = $topic->id;
        $comments = $comment->readByTopic();
    } else {
        die('Tópico não encontrado.');
    }
} else {
    die('ID do tópico não fornecido.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_content']) && !empty($_POST['comment_content'])) {
    $comment->conteudo = $_POST['comment_content'];
    $comment->topico_id = $topic->id;

    $comment->usuario_id = 1; 

    if ($comment->create()) {
        // Redireciona para a mesma página para evitar o envio duplicado do formulário
        header("Location: view_topic.php?id=" . $topic->id);
        exit();
    } else {
        echo '<p>Erro ao adicionar o comentário.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Fórum - Visualizar Tópico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .topic-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .topic-header h1 {
            margin: 0;
            font-size: 2em;
        }
        .topic-header p {
            margin: 10px 0;
            color: #555;
        }
        .comment {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .comment .date {
            color: #777;
        }
        .comment-form {
            margin-top: 20px;
        }
        .back-button {
            margin-bottom: 20px;
        }
        .back-button a {
            text-decoration: none;
            color: #007bff;
            font-size: 1em;
        }
        .back-button a:hover {
            text-decoration: underline;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 1em;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-button">
            <a href="list_topics.php">← Voltar para a lista de tópicos</a>
        </div>

        <div class="topic-header">
            <h1><?php echo htmlspecialchars($topic->titulo); ?></h1>
            <p><?php echo htmlspecialchars($topic->descricao); ?></p>
            <p class="date">Criado em: <?php echo htmlspecialchars($topic->data_criacao); ?></p>
        </div>

        <h2>Comentários</h2>
        <?php
        if ($comments->num_rows > 0) {
            while ($row = $comments->fetch_assoc()) {
                echo '<div class="comment">';
                echo '<p>' . htmlspecialchars($row['conteudo']) . '</p>';
                echo '<p class="date">Comentado em: ' . htmlspecialchars($row['data_comentario']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Nenhum comentário encontrado.</p>';
        }
        ?>

        <div class="comment-form">
            <h3>Adicionar Comentário</h3>
            <form method="post" action="">
                <textarea name="comment_content" rows="5" placeholder="Digite seu comentário aqui..." required></textarea>
                <br>
                <button type="submit">Enviar Comentário</button>
            </form>
        </div>
    </div>
</body>
</html>
