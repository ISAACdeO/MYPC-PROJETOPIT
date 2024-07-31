<?php
class CompatibilidadeComponentes {
    private $pdo;
    private $placas_compativeis = [];
    private $processadores = [];

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->buscarProcessadores();
    }

    private function buscarProcessadores() {
        $queryProcessadores = "SELECT * FROM processadores";
        $stmtProcessadores = $this->pdo->prepare($queryProcessadores);
        $stmtProcessadores->execute();
        $this->processadores = $stmtProcessadores->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarCompatibilidade($processador_id) {
        $query = "
            SELECT pm.nome AS placa_mae
            FROM compatibilidade c
            JOIN placas_mae pm ON c.placa_mae_id = pm.id
            WHERE c.processador_id = :processador_id;
        ";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':processador_id', $processador_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->placas_compativeis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlacasCompatíveis() {
        return $this->placas_compativeis;
    }

    public function getProcessadores() {
        return $this->processadores;
    }

    public function renderizarFormulario() {
        ?>
        <form id="compatibilidade-form" action="" method="POST">
            <label for="processador">Escolha um Processador:</label>
            <select name="processador_id" id="processador">
                <?php foreach ($this->processadores as $processador): ?>
                    <option value="<?= $processador['id'] ?>"><?= $processador['nome'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Ver Placas-Mãe Compatíveis</button>
        </form>
        <?php
    }

    public function renderizarTabelaCompatibilidade() {
        if (!empty($this->placas_compativeis)) {
            echo '<h2>Placas-Mãe Compatíveis:</h2>';
            echo '<table border="1"><tr><th>Placa-Mãe</th></tr>';
            foreach ($this->placas_compativeis as $placa) {
                echo '<tr><td>' . $placa['placa_mae'] . ' ""</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Nenhuma placa-mãe compatível encontrada.</p>';
        }
    }

    public function renderizarMensagem($mensagem) {
        echo '<div class="mensagem">' . htmlspecialchars($mensagem) . '</div>';
    }
}
?>

