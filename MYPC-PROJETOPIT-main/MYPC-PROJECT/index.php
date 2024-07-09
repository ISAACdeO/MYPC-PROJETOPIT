<?php
include_once 'Config/Conexao.php';
include_once 'CONTROLLER/LoginController.php';
//include_once 'CONTROLLER/';

$Con = new Conn();
$conn = $Con->getConnection();

$loginControler = new LoginControler($conn);

//$login = "SELECT logado FROM usuarios where logado = 1;";
$action = isset($_GET['action']) ? $_GET['action'] : '';
$idusuario = isset($_GET['idusuario']) ? $_GET['idusuario'] : null;


switch($action) {
    case 'cadastro_user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $message = $loginControler->Cadastrar($nome, $email, $usuario, $senha);
            echo $message;
            echo '<a href="index.php?action=usuarios">Ir para a Página Principal</a>';
        } else {
            include 'VIEW/PaginaLogin/cadastrar.php';
        }
    break;

    case 'deslogar_user':

            if ($idusuario) {
                $message = $loginControler->Deslog($idusuario);
                echo $message;
                echo '<a href="index.php?action=usuarios"> Ir para a Página Principal</a>';
            } else {
                echo 'Falha ao deslogar.';
            }

    break;

    default:
    include 'VIEW/Home.php';
    break;
}
?>