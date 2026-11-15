<?php

use App\Paciente;
include('../includes/cabecalho.php');
include('../includes/menu.php');
include('../includes/rodape.php');
$id = $_GET['id'];
$paciente = Paciente::buscarPorId($id);
echo "<pre>";
print_r($paciente);
echo "</pre>";

?>
<main class="container">
    <h1>Editar Paciente</h1>
    <form method="POST" action="/consultorio/action/action_paciente.php?action=alterar&id=<?= $id ?>">
        Nome * : <input name="nome" type="text" value="<?= $paciente->nome ?>" class="form-control" required>
        CPF * : <input name="cpf" type="text" value="<?= $paciente->cpf ?>" class="form-control" required>
        Data de Nascimento *: <input name="data_nascimento" type="date" value="<?= $paciente->data_nascimento ?>" class="form-control" required>
        Telefone *: <input name="telefone" type="text" class="form-control" value="<?= $paciente->telefone ?>" required>
        Email * : <input name="email" type="email" class="form-control" value="<?= $paciente->email ?>" required>
        Endereço * : <input name="endereco" type="text" class="form-control" value="<?= $paciente->endereco ?>" required>
        Convenio : <input name="convenio" type="text" class="form-control" value="<?= $paciente->convenio ?>">
        Observação : <input name="observacao" type="text" class="form-control" value="<?= $paciente->observacao ?>">
        <input type="submit" value="Cadastrar" class="btn btn-primary">
    </form>
    <div class="pb-5"></div>
</main>
