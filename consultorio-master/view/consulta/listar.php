<?php
use App\Consulta;

include('../includes/cabecalho.php');
include('../includes/menu.php');

$consultas = Consulta::listar();
$escape = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>
<main class="container">
    <h1 class="text-center">Lista de Consultas</h1>
    <div class="text-end my-2">
        <a href="/consultorio/view/consulta/cadastrar.php" class="btn btn-success">Nova Consulta</a>
    </div>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Paciente</th>
                <th>Dentista</th>
                <th>Data e hora</th>
                <th>Valor total</th>
                <th>Valor pago</th>
                <th>Pagamento</th>
                <th>Procedimentos realizados</th>
                <th>Procedimentos a realizar</th>
                <th>Descrição</th>
                <th>Medicação</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= $escape($consulta->paciente_nome) ?></td>
                    <td><?= $escape($consulta->dentista_nome) ?></td>
                    <td><?= $escape(date('d/m/Y H:i', strtotime($consulta->data_hora))) ?></td>
                    <td>R$ <?= $escape($consulta->valor_total) ?></td>
                    <td>R$ <?= $escape($consulta->valor_pago) ?></td>
                    <td><?= $escape($consulta->forma_pagamento) ?></td>
                    <td><?= $escape($consulta->procedimentos_realizados) ?></td>
                    <td><?= $escape($consulta->procedimentos_arealizar) ?></td>
                    <td><?= $escape($consulta->descricao) ?></td>
                    <td><?= $escape($consulta->medicacao) ?></td>
                    <td><a href="editar.php?id=<?= (int) $consulta->id ?>" class="btn btn-primary">Editar</a></td>
                    <td>
                        <a href="/consultorio/action/action_consulta.php?action=excluir&id=<?= (int) $consulta->id ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Deseja excluir esta consulta?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pb-5"></div>
</main>
<?php include('../includes/rodape.php'); ?>
