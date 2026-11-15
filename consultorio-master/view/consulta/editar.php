<?php
use App\Consulta;
use App\Funcionario;
use App\Paciente;

include('../includes/cabecalho.php');
include('../includes/menu.php');

$id = (int) ($_GET['id'] ?? 0);
$consulta = Consulta::buscarPorId($id);
if (!$consulta) {
    http_response_code(404);
    exit('Consulta não encontrada.');
}
$pacientes = Paciente::listar(null, 'nome');
$dentistas = Funcionario::listar("perfil = 'dentista'", 'nome');
$formasPagamento = ['DINHEIRO', 'PIX', 'CARTÃO DE DEBITO', 'CARTÃO DE CREDITO'];
$dataHora = date('Y-m-d\TH:i', strtotime($consulta->data_hora));
$escape = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>
<main class="container">
    <h1>Alterar Consulta</h1>
    <form method="POST" action="/consultorio/action/action_consulta.php?action=alterar&id=<?= $id ?>">
        <label for="paciente_id">Paciente *:</label>
        <select id="paciente_id" name="paciente_id" class="form-select" required>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= (int) $paciente->id ?>" <?= (int) $paciente->id === (int) $consulta->paciente_id ? 'selected' : '' ?>><?= $escape($paciente->nome) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="dentista_id">Dentista *:</label>
        <select id="dentista_id" name="dentista_id" class="form-select" required>
            <?php foreach ($dentistas as $dentista): ?>
                <option value="<?= (int) $dentista->id ?>" <?= (int) $dentista->id === (int) $consulta->dentista_id ? 'selected' : '' ?>><?= $escape($dentista->nome) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="data_hora">Data e hora *:</label>
        <input id="data_hora" name="data_hora" type="datetime-local" value="<?= $escape($dataHora) ?>" class="form-control" required>
        <label for="valor_total">Valor total *:</label>
        <input id="valor_total" name="valor_total" type="number" min="0" step="0.01" value="<?= $escape($consulta->valor_total) ?>" class="form-control" required>
        <label for="valor_pago">Valor pago *:</label>
        <input id="valor_pago" name="valor_pago" type="number" min="0" step="0.01" value="<?= $escape($consulta->valor_pago) ?>" class="form-control" required>

        <label for="forma_pagamento">Forma de pagamento *:</label>
        <select id="forma_pagamento" name="forma_pagamento" class="form-select" required>
            <?php foreach ($formasPagamento as $formaPagamento): ?>
                <option value="<?= $escape($formaPagamento) ?>" <?= $formaPagamento === $consulta->forma_pagamento ? 'selected' : '' ?>><?= $escape($formaPagamento) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="procedimentos_realizados">Procedimentos realizados:</label>
        <input id="procedimentos_realizados" name="procedimentos_realizados" type="text" maxlength="255" value="<?= $escape($consulta->procedimentos_realizados) ?>" class="form-control">
        <label for="procedimentos_arealizar">Procedimentos a realizar:</label>
        <input id="procedimentos_arealizar" name="procedimentos_arealizar" type="text" maxlength="255" value="<?= $escape($consulta->procedimentos_arealizar) ?>" class="form-control">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" maxlength="255" class="form-control"><?= $escape($consulta->descricao) ?></textarea>
        <label for="medicacao">Medicação:</label>
        <input id="medicacao" name="medicacao" type="text" maxlength="255" value="<?= $escape($consulta->medicacao) ?>" class="form-control">

        <input type="submit" value="Salvar Alterações" class="btn btn-primary mt-3">
    </form>
    <div class="pb-5"></div>
</main>
<?php include('../includes/rodape.php'); ?>
