<?php

include_once(__DIR__ . '/Conexao.php');

class Class_PCBuilder {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function buscarComponentesPorOrcamento($orcamento) {
        $componentesSelecionados = [];
        $orcamentoRestante = $orcamento;

        $tabelas = [
            'placas_video' => 'placas_video',
            'memoria_ram' => 'memoria_ram',
            'fonte' => 'fonte',
            'processadores' => 'processadores',
            'placas_mae' => 'placas_mae'
        ];

        foreach ($tabelas as $tipo => $tabela) {
            $sql = "SELECT id, nome, preco, descricao, descricao_detalhada, imagem, link_loja 
                    FROM $tabela 
                    WHERE preco <= ? 
                    ORDER BY preco DESC 
                    LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("d", $orcamentoRestante);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($resultado->num_rows > 0) {
                $componente = $resultado->fetch_assoc();
                $componentesSelecionados[$tipo] = $componente;
                $orcamentoRestante -= $componente['preco'];
            }
            $stmt->close();
        }

        return $componentesSelecionados;
    }
}
?>
