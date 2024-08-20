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
        <?php

if(isset($_SESSION['msg'])){
 echo $_SESSION['msg'];
 unset($_SESSION['msg']);
}

 ?>
        <form action="valida.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" name = "usuario" placeholder="Digite o seu usario" required>

            <label for="password">Senha:</label>
            <input type="password" name = "senha" placeholder="Digite o sua senha">

            <input type = "submit" name="btnLogin" value="Acessar">

            <h4>Voce não possui uma conta ?</h4>
            <a href="telaDRegistro.php">Cria gratis</a>
        </form>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 MYPC. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>

</html>