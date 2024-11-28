<?php
session_start();
require_once 'Config/Conexao.php';
require_once 'Models/UsuarioModel.php';
require_once 'Controllers/UsuarioController.php';

$controller = new UsuarioController();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'register') {
        $controller->cadastrar();
    } elseif ($_GET['action'] === 'login') {
        $controller->login();
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYPC</title>
    <link rel="stylesheet" href="Css/index.css">
</head>
<body>
    <h1>Bem-vindo ao MYPC</h1>
    <div id="Lista">
    <a href="views/register.php">Cadastrar</a> | 
    <a href="views/login.php">Login</a>
    <a href="index_tecnicos.php">Sou Tecnico</a>
    </div>
</body>
</html>