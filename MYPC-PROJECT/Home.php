
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Home.css">

</head>
<body>
<?php
    session_start();
    $userName = isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome']) : "Conta";
    ?>
    <header>
        <div class="logo">MYPC</div>
        <div class="account"><?php echo "Bem-vindo, " . $userName; ?></div>
     
    </header>
    <main>
        <h1>No que podemos te ajudar?</h1>
        <div class="services">
            <div class="service">
            <a href="VIEW/PagMontagem.php">
                <img src="https://img.freepik.com/vetores-premium/pc-de-montagem-hardware-de-computador-pessoal_169241-849.jpg" alt="Montagem">
                <div class="overlay">Montagem</div>
            </div>
            <div class="service">
    <a href="VIEW/PagSuporte.php">
        <img src="https://cecead.com/wp-content/uploads/2021/02/Curso_Montagem_E_Manuten_o_De_Computadores.png" alt="Contatar Suporte">
        <div class="overlay">Contatar Suporte</div>
    </a>
</div>
            <div class="service">
                <img src="https://static.vecteezy.com/ti/vetor-gratis/p3/2631488-computer-repair-service-rgb-color-icon-installation-software-on-notebook-upgrade-system-pc-maintenance-tech-support-for-electronics-laptop-problems-isolated-vector-illustration-vetor.jpg" alt="Upgrade">
                <div class="overlay">Upgrade</div>
            </div>
            <div class="service">
                <img src="https://img.freepik.com/vetores-premium/ilustracao-isometrica-de-hardware-de-computador-processador-placa-mae-disco-rigido-clipart-isolado-de-ventilador_276875-363.jpg" alt="Compatibilidade">
                <div class="overlay">Compatibilidade</div>
            </div>
        </div>
    </main>


    <main class="main-2">
        <h1>Sujestões de computadores !</h1>
        <div class="services-2">
            <div class="service-2">
            <a href="VIEW/PagComputador.php">
                <img src="https://thumbs.dreamstime.com/b/personal-computer-images-vector-form-simple-233451801.jpg" alt="Montagem">
                <div class="overlay">Computador</div>
            </div>
        
            <div class="service-2">
            <a href="VIEW/PagNotebook.php">
                <img src="https://img.freepik.com/vetores-premium/ilustracao-vetorial-notebook-notebook-com-codigos-abertos-na-tela_760443-406.jpg?w=996" alt="Compatibilidade">
                <div class="overlay">Nootebook</div>
            </div>
        </div>
    </main>


    <footer>
     
    </footer>
    
</body>
</html>






