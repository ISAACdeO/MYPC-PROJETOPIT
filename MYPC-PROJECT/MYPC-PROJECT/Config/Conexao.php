<?php

class Conexao {
    private $host = 'localhost'; 
    private $usuario = 'root';
    private $senha = ''; 
    private $banco = 'database_mypc'; 
    private $conexao;

    public function __construct() {
        $this->conectar();
    }

    private function conectar() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_error) {
            die("Erro na conexão: " . $this->conexao->connect_error);
        }
    }

    public function getConnection() {
        return $this->conexao;
    }

    public function fecharConexao() {
        if ($this->conexao) {
            $this->conexao->close();
        }
    }
}
?>
