<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - MYPC</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 100vh;
            margin: 0;
        }

        .header {
            width: 100%;
            background-color: #383434;
            color: #0078d4;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            font-size: 24px;
            font-weight: bold;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header .title {
            text-align: left;
        }

        .header .nav-links {
            display: flex;
            gap: 15px;
            font-size: 16px;
        }

        .header .nav-links a {
            color: #0078d4;
            text-decoration: none;
            transition: color 0.3s;
        }

        .header .nav-links a:hover {
            color: #005bb5;
        }

        .main-content {
            margin-top: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: calc(100vh - 200px);
        }

        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 25px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn {
            background-color: #0078d4;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #005bb5;
        }

        .register-link {
            margin-top: 15px;
            font-size: 14px;
            color: #0078d4;
            text-decoration: none;
            display: inline-block;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .footer {
            width: 100%;
            background-color: #383434;
            color: #0078d4;
            text-align: center;
            padding: 20px 0;
            font-size: 16px;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
<header class="header">
        <div class="title">MYPC</div>
        <nav class="nav-links">
            <a href="/home">Home</a>
            <a href="/build">Build</a>
            <a href="/recomendacoes">Recomendações</a>
            <a href="/forum">Fórum</a>
        </nav>
    </header>
    <h2>Cadastrar</h2>
    <div class="main-content">
        <div class="login-container">
            <div class="logo">Bem-vindo ao MYPC</div>
    <form method="POST" action="../index_tecnicos.php?action=register">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" class="input-field" id="nome" name="nome" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" class="input-field" id="email" name="email" required>
        </div>
        <div>
            <label for="usuario">Usuário:</label>
            <input type="text" class="input-field" id="usuario" name="usuario" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" class="input-field" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn">Cadastrar</button>
    </form>
    <a href="../index.php" class="register-link">Voltar</a>
    <br>
    <a href="login" class="register-link">Já tem uma conta? Login</a>
    </div>
    </div>
    </div>
    <footer class="footer">
        MYPC - Todos os direitos reservados
    </footer>
</body>
</html>