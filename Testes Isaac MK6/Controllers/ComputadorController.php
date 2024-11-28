<?php
class ComputadorController{
public function Montar(){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados do formulário
    $orcamento = filter_input(INPUT_POST, 'orcamento', FILTER_VALIDATE_FLOAT);

    if ($orcamento !== false && $orcamento > 0) {
        // Criar instância do Model e configurar o orçamento
        $computador = new Computador();
        $computador->setOrcamento($orcamento);

        $computador->CriaLimite();
    } else {
        echo "Orçamento inválido. Tente novamente.";
    }
}
}

}
?>