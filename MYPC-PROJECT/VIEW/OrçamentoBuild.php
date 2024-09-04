<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Orçamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #ffa500; 
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #ffa500; 
        }
        input[type="number"] {
            width: calc(100% - 24px);
            padding: 10px;
            border: 1px solid #444;
            border-radius: 4px;
            background-color: #333;
            color: #fff;
            font-size: 1em;
        }
        button {
            background-color: #ffa500;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #e59400; 
        }
        a {
            display: block;
            text-align: center;
            color: #ffa500; 
            text-decoration: none;
            margin-top: 15px;
            font-size: 1.2em;
        }
        a:hover {
            color: #e59400; 
        }
    </style>
</head>
<body>
    <h1>Buscar Orçamento</h1>
    <form action="index_build.php" method="get">
        <label for="preco">Digite seu orçamento:</label>
        <input type="number" id="preco" name="preco" required>
        <button type="submit" name="action" value="processOrcamento">Buscar</button>
        <a href="view_builds.php">Ver builds salvas</a>
    </form>
</body>
</html>
