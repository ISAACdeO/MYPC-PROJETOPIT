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

        // Redirecionar ou exibir resultado (View ou outra lógica)
        echo "Orçamento definido: R$ " . number_format($orcamento, 2, ',', '.');
        echo "<br>Limite por peça: R$ " . number_format($computador->getPercentual(), 2, ',', '.');
    } else {
        echo "Orçamento inválido. Tente novamente.";
    }
}
}

}
?>