<?php
session_start();

// Conexão com o banco de dados MYPC_DB
$conn = new mysqli("localhost", "root", "", "MYPC_DB");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepara a consulta SQL para inserir o usuário
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Erro ao registrar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
