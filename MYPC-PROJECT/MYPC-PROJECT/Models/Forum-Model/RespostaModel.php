<?php

require_once 'config/Conexao.php';

class Resposta {
    private $conn;
    private $table_name = "respostas";
    public $id;
    public $topico_id;
    public $usuario_id;
    public $conteudo;
    public $data_criacao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " (topico_id, usuario_id, conteudo) VALUES (:topico_id, :usuario_id, :conteudo)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":topico_id", $this->topico_id);
        $stmt->bindParam(":usuario_id", $this->usuario_id);
        $stmt->bindParam(":conteudo", $this->conteudo);

        return $stmt->execute();
    }

    // Método para listar respostas por tópico
    public function listarPorTopico($topico_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE topico_id = :topico_id ORDER BY data_criacao ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":topico_id", $topico_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
