<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../views/login.php'); 
    exit();
}

$user = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MYPC</title>
  <link rel="stylesheet" href="../Css/Home.css">
</head>
<body>
<header>
    <div class="container">
        <a href="#" class="logo"><h1>MYPC</h1></a>
        <div class="user-greeting">
            <h1>Bem-vindo, <?php echo htmlspecialchars($user['nome']); ?>!</h1>
        </div>
        <p>Esta é a página inicial do MYPC.</p>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="VIEW/view_builds.php">Builds Recomendadas</a></li>
                <li><a href="VIEW/list_topics.php">Forum</a></li>
            </ul>
        </nav>
       <!-- <div class="search">
            <input type="text" placeholder="Pesquisar">
            <button type="submit"><img src="../Assets/lupa.png" alt="Pesquisar" width="20px" height="20px" id="lupa"></button>
        </div> -->
        <div class="actions">
        <div id="Saida">
        <a href="../logout.php">Sair</a>
        </div>
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
          <a class="Menus" href="Montagem"><img src="../Assets/montando.jpg" alt="Imagem de Montagem"></a>
        </div>
        <div class="card">
          <h3>Manual</h3>
          <a class="Menus" href="../html/Manual.html"><img id="Manual" src="../Assets/manual.jpg" alt="Imagem de Manual"></a>
        </div>
        <div class="card">
          <h3>Gerenciar Builds</h3>
          <a class="Menus" href="VIEW/PagCompatibilidade_video.php"><img src="../Assets/upgrade.png" alt="Imagem de Upgrade"></a>
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