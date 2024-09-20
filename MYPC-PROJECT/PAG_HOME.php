<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYPC - Página Inicial</title>
    <link rel="stylesheet" href="PAG_HOME.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="index.html"><h1>MYPC</h1></a>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="VIEW/view_builds.php">Builds</a></li>
                    <li><a href="recomendacoes.html">Recomendações</a></li>
                    <li><a href="suporte.html">Suporte</a></li>
                </ul>
            </nav>
            <div class="search">
                <input type="text" placeholder="Pesquisar">
                <button type="submit"><img src="lupa.png" alt="" width="20px" height="20px" id="lupa"></button>
            </div>
            <div class="actions">
                <?php if (isset($_SESSION['user_name'])): ?>
                    <span>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</span>
                    <a href="logout.php"><button type="button">Sair</button></a>
                <?php else: ?>
                    <button type="button" onclick="window.location.href='login.php'">Entrar</button>
                    <button type="button" onclick="window.location.href='register.php'">Registrar</button>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="text-content">
                <h2>Monte o computador perfeito para você.</h2>
                <p>Compatibilidade e desempenho estão ao seu alcance.</p>
            </div>
            <div class="cards">
                <div class="card">
                    <h3>Montagem</h3>
                    <a href="VIEW/OrçamentoBuild.php"><img src="montando.jpg" alt="Imagem de Montagem"></a>
                </div>
                <div class="card">
                    <h3>Manual</h3>
                    <a href="manual.html"><img src="manual.jpg" alt="Imagem de Manual"></a>
                </div>
                <div class="card">
                    <h3>Compatibilidade</h3>
                    <a href="VIEW/PagCompatibilidade_video.php"><img src="upgrade.png" alt="Imagem de Upgrade"></a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p id="p1">&copy; 2023 MYPC. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
