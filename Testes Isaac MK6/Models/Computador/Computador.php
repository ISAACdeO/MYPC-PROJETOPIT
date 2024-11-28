<?php
class Computador {
    private $conexao;
    private $placas_mae;
    private $memorias_ram;
    private $processadores;
    private $placas_de_video;
    private $armazenamentos;
    private $fontes;
    private float $Orcamento;
    private float $ResultadoFinal;
    private float $Percentual;

    public function __construct() {
        $this->conexao = (new Conexao())->getConnection();
        $this->placas_mae = array_fill(0, 6, null);
        $this->memorias_ram = array_fill(0, 6, null);
        $this->processadores = array_fill(0, 6, null);
        $this->placas_de_video = array_fill(0, 6, null);
        $this->armazenamentos = array_fill(0, 6, null);
        $this->fontes = array_fill(0, 6, null);
    }

    public function CriaLimite(){
        $this->Percentual = $this->$Orcamento * 0.1667;
    }

    public function setOrcamento(float $orcamento) {
        $this->orcamento = $this->$orcamento;
    }

    public function getOrcamento(): float {
        return $this->orcamento;
    }
    public function VerificarCompatibilidade(){
        
    }

}
?>