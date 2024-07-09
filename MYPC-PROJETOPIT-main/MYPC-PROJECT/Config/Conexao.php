<?php
class Conn
{
private $host = "localhost"; // Endereço do servidor MySQL (geralmente 'localhost' para desenvolvimento local)
private $username = "root"; // Nome de usuário do MySQL
private $password = ""; // Senha do MySQL
private $db_name = "MYPC_PIT"; // Nome do banco de dados que você quer se conectar
public $conn;

public function getConnection() {
    $this->conn = null;

    try {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $exception) {
        echo "Connection error: " . $exception->getMessage();
    }
    
    return $this->conn;
}
}
?>