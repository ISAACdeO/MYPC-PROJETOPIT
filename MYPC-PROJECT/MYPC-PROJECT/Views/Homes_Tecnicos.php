<?php
session_start();

if (!isset($_SESSION['tecnico'])) {
    header('Location: ../views/loginTecnico.php'); 
    exit();
}

$tecnico = $_SESSION['tecnico'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MYPC - Técnico</title>
  <link rel="stylesheet" href="Homes_Tecnicos.css">
</head>
<body>
  <header>
    <div class="container">
        <a href="index.html"><h1>MYPC</h1></a>
        <h1>Bem-vindo, <?php echo htmlspecialchars($tecnico['nome']); ?>!</h1>
        <p>Esta é a página inicial do MYPC para Técnicos.</p>
        <a href="../logout.php">Sair</a>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="VIEW/view_builds.php">Builds</a></li>
          <li><a href="VIEW/PAGS_RECOMENDACAO/PagComputador.php">Recomendações</a></li>
          <li><a href="VIEW/list_topics.php">Fórum</a></li>
        </ul>
      </nav>
      <div class="search">
        <input type="text" placeholder="Pesquisar">
        <button type="submit"><img src="Assets/lupa.png" alt="Pesquisar" width="20px" height="20px" id="lupa"></button>
      </div>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="text-content">
        <h2>Gerencie os serviços de tecnologia.</h2>
        <p>Utilize as ferramentas disponíveis para otimizar seu trabalho.</p>
      </div>
      <div class="cards">
        <div class="card">
          <h3>Gestão de Chamados</h3>
          <a href="VIEW/GestaoChamados.php"><img src="Assets/chamado.jpg" alt="Imagem de Chamados"></a>
        </div>
        <div class="card">
          <h3>Manutenção de Equipamentos</h3>
          <a href="VIEW/Maintenance.php"><img src="Assets/maintenance.jpg" alt="Imagem de Manutenção"></a>
        </div>
        <div class="card">
          <h3>Relatórios</h3>
          <a href="VIEW/Relatorios.php"><img src="Assets/relatorios.jpg" alt="Imagem de Relatórios"></a>
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
