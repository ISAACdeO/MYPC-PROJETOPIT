<?php
session_start();
require_once 'Config/Conexao.php';
require_once 'Models/TecnicoModel.php';
require_once 'Controllers/TecnicoController.php';

$controller = new TecnicoController();

// Verifica a ação solicitada
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'register') {
        $controller->cadastrar();
    } elseif ($_GET['action'] === 'login') {
        $controller->login();
    }
}

// Se o técnico estiver logado, redireciona para a página principal
if (isset($_SESSION['tecnico'])) {
    header('Location: Views/Homes_Tecnicos.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYPC</title>
</head>
<body>
    <h1>Bem-vindo ao MYPC</h1>
    <a href="index.php">Voltar a tela de login de usuario</a><br>
    <a href="views/registerTecnico.php">Cadastrar</a> | 
    <a href="views/loginTecnico.php">Login</a>
</body>
</html>
