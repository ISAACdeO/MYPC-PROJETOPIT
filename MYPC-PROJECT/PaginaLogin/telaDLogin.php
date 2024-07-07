<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="telaDLogin.css">
    <title>MYPC</title>
</head>

<body>
    <header>
        <h1 id="mypc">MYPC</h1>
        <nav>
            <a href="index.php" id="home">Home</a>
            <a href="telaDRegistro.php" id="cadastrar">Cadastrar</a>
            <a href="sobre-nos.php" id="sobreN">Sobre Nós</a>
            <a href="build.php" id="build">Build</a>
        </nav>
    </header>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">E-Mail:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" id="btn1">Fazer Login</button>
        </form>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 MYPC. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>

</html>