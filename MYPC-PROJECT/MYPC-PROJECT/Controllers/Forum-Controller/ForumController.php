<?php

require_once 'Model/Forum-Model/TopicoModel.php';
require_once 'Model/Forum-Model/RespostaModel.php';
require_once 'Config/Database.php';

class ForumController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Exibe todos os tópicos
    public function index() {
        $topico = new Topico($this->db);
        $topicos = $topico->listar();
        include 'views/forum/index.php';
    }

    public function visualizarTopico($topico_id) {
        $topico = new Topico($this->db);
        $resposta = new Resposta($this->db);

        $dadosTopico = $topico->listar()[$topico_id]; 
        $respostas = $resposta->listarPorTopico($topico_id);

        include 'views/forum/topico.php';
    }

    public function criarTopico($usuario_id, $titulo, $conteudo) {
        $topico = new Topico($this->db);
        $topico->usuario_id = $usuario_id;
        $topico->titulo = $titulo;
        $topico->conteudo = $conteudo;
        return $topico->criar();
    }

    public function criarResposta($topico_id, $usuario_id, $conteudo) {
        $resposta = new Resposta($this->db);
        $resposta->topico_id = $topico_id;
        $resposta->usuario_id = $usuario_id;
        $resposta->conteudo = $conteudo;
        return $resposta->criar();
    }
}
