<?php
class Topic {
    private $conn;
    private $table_name = "topicos";

    public $id;
    public $titulo;
    public $descricao;
    public $data_criacao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (titulo, descricao, data_criacao) VALUES (?, ?, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $this->titulo, $this->descricao);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readAll() {
        $query = "SELECT id, titulo, descricao, data_criacao FROM " . $this->table_name . " ORDER BY data_criacao DESC";
        $stmt = $this->conn->query($query);

        return $stmt;
    }

    public function readOne() {
        $query = "SELECT id, titulo, descricao, data_criacao FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($this->id, $this->titulo, $this->descricao, $this->data_criacao);
            $stmt->fetch();
            return true;
        }

        return false;
    }
}
?>
