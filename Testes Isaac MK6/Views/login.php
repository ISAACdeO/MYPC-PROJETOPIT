<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MYPC</title>
    <link rel="stylesheet" href="../Css/CssLogin">
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
    <h2>Login</h2>
    <div class="main-content">
        <div class="login-container">
            <div class="logo">Bem-vindo ao MYPC</div>
    <form method="POST" action="../index.php?action=login">
        <div>
            <label for="email">Email:</label>
            <input type="email" class="input-field" id="email" name="email" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" class="input-field" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn">Entrar</button>
    </form>
    <a href="../index" class="register-link">Voltar</a>
    <br>
    <a href="register" class="register-link">Não tem uma conta? Registre-se</a>
    </div>
    </div>
    </div>
    <footer class="footer">
        MYPC - Todos os direitos reservados
    </footer>
</body>
</html>
