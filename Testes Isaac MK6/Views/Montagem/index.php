<?php
require_once '../../Controllers/ComputadorController.php';
require_once '../../Models/Computador/Computador.php';
require_once '../../Config/Conexao.php';
$controllerComputador = new ComputadorController();
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'montar') {
        $controllerComputador->Montar();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="index.php?action=montar">
    <div>
    Qual é o orçamento que você pretende investir?
    <input type="number" name="orcamento" required>
    </div>
    <button type="submit">Começar</button>
    </form>
</body>
</html>