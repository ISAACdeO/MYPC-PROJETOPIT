<?php
// Inclua a classe de conexão com o banco de dados
include_once(__DIR__ . '/../MODEL/Conexao.php'); 

// Crie uma instância da classe Conexao
$conexao = new Conexao();

// Obtenha a conexão mysqli
$mysqli = $conexao->getConnection();

// Obtenha o ID da placa de vídeo da URL
$placa_video_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Inicie uma variável para armazenar os dados da placa de vídeo
$placa_video = null;

if ($placa_video_id) {
    // Prepare e execute a consulta
    $stmt = $mysqli->prepare("SELECT * FROM placas_video WHERE id = ?");
    $stmt->bind_param("i", $placa_video_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $placa_video = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição da Placa de Vídeo</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            margin: 0;
            padding: 0;
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

        .header .welcome {
            font-size: 1em;
        }

        .container {
            padding: 20px;
        }

        .product-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            align-items: center;
        }

        .product-image {
            flex: 1;
            text-align: center;
        }

        .product-image img {
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease;
        }

        .product-info {
            flex: 2;
            padding-left: 20px;
        }

        .product-info h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .product-info p {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .product-info .quality {
            font-weight: bold;
        }

        .product-info .price {
            font-size: 1.5em;
            color: #28a745;
            margin-bottom: 10px;
        }

        .buy-button, .cart-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        .buy-button:hover, .cart-button:hover {
            background-color: #0056b3;
        }

        .product-description {
            margin-top: 20px;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">MYPC</div>
        <div class="welcome">Bem-vindo, Conta</div>
    </div>
    <div class="container">
        <div class="product-container">
            <div class="product-image">
                <?php if ($placa_video): ?>
                    <img id="product-img" src="<?= htmlspecialchars($placa_video['imagem']) ?>" alt="<?= htmlspecialchars($placa_video['nome']) ?>">
                <?php else: ?>
                    <img id="product-img" src="produto.jpg" alt="Produto Não Encontrado">
                <?php endif; ?>
            </div>
            <div class="product-info">
                <?php if ($placa_video): ?>
                    <h1><?= htmlspecialchars($placa_video['nome']) ?></h1>
                    <p><?= htmlspecialchars($placa_video['descricao']) ?></p>
                    <div class="price">Média de preço: R$ <?= htmlspecialchars($placa_video['preco']) ?></div>
                    <p class="quality"><strong>Qualidade:</strong> <?= htmlspecialchars($placa_video['qualidade']) ?></p>
                <?php else: ?>
                    <h1>Produto Não Encontrado</h1>
                    <p>Desculpe, não conseguimos encontrar a placa de vídeo solicitada.</p>
                <?php endif; ?>
                <a href="https://www.exemplo.com/comprar-produto" class="buy-button">Lugares para comprar</a>
                <a href="#" class="cart-button">Adicionar ao Carrinho</a>
                <div class="product-description">
                    <h2>Descrição Detalhada</h2>
                    <?php if ($placa_video): ?>
                        <p><?= htmlspecialchars($placa_video['descricao_detalhada']) ?></p>
                    <?php else: ?>
                        <p>Nenhuma descrição disponível.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productImage = document.getElementById('product-img');

            productImage.addEventListener('mouseover', function() {
                productImage.style.transform = 'scale(1.1)';
            });

            productImage.addEventListener('mouseout', function() {
                productImage.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
