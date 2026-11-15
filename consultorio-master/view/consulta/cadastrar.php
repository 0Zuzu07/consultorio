<?php
use App\Funcionario;
use App\Paciente;

include('../includes/cabecalho.php');
include('../includes/menu.php');

$pacientes = Paciente::listar(null, 'nome');
$dentistas = Funcionario::listar("perfil = 'dentista'", 'nome');
$formasPagamento = ['DINHEIRO', 'PIX', 'CARTÃO DE DEBITO', 'CARTÃO DE CREDITO'];
?>
<main class="container">
    <h1>Cadastrar Consulta</h1>
    <form method="POST" action="/consultorio/action/action_consulta.php?action=cadastrar">
        <label for="paciente_id">Paciente *:</label>
        <select id="paciente_id" name="paciente_id" class="form-select" required>
            <option value="">Selecione o paciente</option>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= (int) $paciente->id ?>"><?= htmlspecialchars($paciente->nome, ENT_QUOTES, 'UTF-8') ?></option>
            <?php endforeach; ?>
        </select>

        <label for="dentista_id">Dentista *:</label>
        <select id="dentista_id" name="dentista_id" class="form-select" required>
            <option value="">Selecione o dentista</option>
            <?php foreach ($dentistas as $dentista): ?>
                <option value="<?= (int) $dentista->id ?>"><?= htmlspecialchars($dentista->nome, ENT_QUOTES, 'UTF-8') ?></option>
            <?php endforeach; ?>
        </select>

        <label for="data_hora">Data e hora *:</label>
        <input id="data_hora" name="data_hora" type="datetime-local" class="form-control" required>
        <label for="valor_total">Valor total *:</label>
        <input id="valor_total" name="valor_total" type="number" min="0" step="0.01" value="0.00" class="form-control" required>
        <label for="valor_pago">Valor pago *:</label>
        <input id="valor_pago" name="valor_pago" type="number" min="0" step="0.01" value="0.00" class="form-control" required>

        <label for="forma_pagamento">Forma de pagamento *:</label>
        <select id="forma_pagamento" name="forma_pagamento" class="form-select" required>
            <option value="">Selecione</option>
            <?php foreach ($formasPagamento as $formaPagamento): ?>
                <option value="<?= htmlspecialchars($formaPagamento, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($formaPagamento, ENT_QUOTES, 'UTF-8') ?></option>
            <?php endforeach; ?>
        </select>

        <label for="procedimentos_realizados">Procedimentos realizados:</label>
        <input id="procedimentos_realizados" name="procedimentos_realizados" type="text" maxlength="255" class="form-control">
        <label for="procedimentos_arealizar">Procedimentos a realizar:</label>
        <input id="procedimentos_arealizar" name="procedimentos_arealizar" type="text" maxlength="255" class="form-control">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" maxlength="255" class="form-control"></textarea>
        <label for="medicacao">Medicação:</label>
        <input id="medicacao" name="medicacao" type="text" maxlength="255" class="form-control">

        <input type="submit" value="Cadastrar" class="btn btn-primary mt-3">
    </form>
    <div class="pb-5"></div>
</main>
<?php include('../includes/rodape.php'); ?>
