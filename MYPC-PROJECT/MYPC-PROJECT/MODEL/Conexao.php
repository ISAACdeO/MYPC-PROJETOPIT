<?php
class Conexao {
    private $host = "localhost";
    private $db_name = "MYPC_DB";
    private $username = "root";
    private $password = "root";
    public $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Verifica se houve erro na conexão
        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
